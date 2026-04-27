<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachHangDangKyRequest;
use App\Models\KhachHang;
use App\Models\PhanQuyen;
use App\Jobs\jobGuiMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class KhachHangController extends Controller
{
    public function getData()
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 2;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $data = KhachHang::all();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu khách hàng thành công',
            'data'    => $data,
        ]);
    }

    public function addData(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 2;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        KhachHang::create([
            'ho_va_ten'    => $request->ho_va_ten,
            'email'        => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'password'     => $request->password,
            'cccd'         => $request->cccd,
            'ngay_sinh'    => $request->ngay_sinh,
            'is_block'     => 0
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm khách hàng ' . $request->ho_va_ten . ' thành công',
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 2;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        KhachHang::where('id', $request->id)->update([
            'ho_va_ten'    => $request->ho_va_ten,
            'email'        => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'password'     => $request->password,
            'cccd'         => $request->cccd,
            'ngay_sinh'    => $request->ngay_sinh,
            'is_block'     => 0
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật khách hàng ' . $request->ho_va_ten . ' thành công'
        ]);
    }

    public function destroy(Request $request)
    {
         $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 2;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        KhachHang::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa khách hàng thành công'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 2;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        KhachHang::where('id', $request->id)->update(['is_block' => $request->is_block]);
        return response()->json(['status' => true, 'message' => 'Thay đổi trạng thái khách hàng thành công']);
    }

    public function dangNhap(Request $request)
{
    $check = KhachHang::where('email', $request->email)
        ->where('password', $request->password)
        ->first();

    if ($check) {
        // Kiểm tra tài khoản đã kích hoạt chưa
        if ($check->is_active == 0) {
            return response()->json([
                'status'  => false,
                'message' => 'Tài khoản của bạn chưa được kích hoạt!',
            ]);
        }

        // Nếu đã active thì mới tạo token và cho đăng nhập
        return response()->json([
            'status'  => true,
            'message' => 'Đăng nhập thành công',
            'token'   => $check->createToken('key_client')->plainTextToken,
        ]);
    } else {
        return response()->json([
            'status'  => false,
            'message' => 'Tài khoản sai email hoặc password',
        ]);
    }
}
    public function doiMatKhau(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\KhachHang) {

            if ($user->password != $request->password) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Mật khẩu hiện tại không đúng. Vui lòng nhập lại.'
                ]);
            } else {
                if ($request->new_password != $request->confirm_password) {
                    return response()->json([
                        'status'    =>  0,
                        'message'   =>  'Mật khẩu hiện mới và xác nhận không khớp. Vui lòng nhập lại.'
                    ]);
                } else {
                    $user->password = $request->new_password;
                    $user->save();

                    return response()->json([
                        'status'    =>  1,
                        'message'   =>  'Đổi mật khẩu thành công.'
                    ]);
                }
            }
        }
    }

    public function dangKy(KhachHangDangKyRequest $request)
    {
        KhachHang::create([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'password'      => $request->password,
            'cccd'          => $request->cccd,
            'ngay_sinh'     => $request->ngay_sinh,
            'is_block'      => 0,
            'is_active'     => 0,
        ]);
        $x['ho_va_ten']     = $request->ho_va_ten;
        $x['email']         = $request->email;
        $x['ma_kich_hoat'] = rand(100000, 999999);
        jobGuiMail::dispatch($request->email, 'Mail đăng ký tài khoản khách hàng', $x, 'mail');
        return response()->json([
            'status' => true,
            'message' => 'Đăng ký thành công',
        ]);
    }

    public function checkToken(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user) {
            return response()->json([
                'status' => true,
                'ho_ten' => $user->ho_va_ten,
                'email'  => $user->email,
                'avatar' => $user->avatar,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập.',
            ]);
        }
    }

    public function getProfile(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\KhachHang) {
            return response()->json([
                'status' => true,
                'data'   => $user,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập.',
            ]);
        }
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\KhachHang) {
            $user->update([
                'ho_va_ten'     => $request->ho_va_ten,
                'ngay_sinh'     => $request->ngay_sinh,
                'so_dien_thoai' => $request->so_dien_thoai,
                'avatar'        => $request->avatar,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thông tin profile thành công',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền thực hiện chức năng này!',
            ]);
        }
    }

    public function dangXuat(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\KhachHang) {
            DB::table('personal_access_tokens')
                ->where('id', $user->currentAccessToken()->id)
                ->delete();
            return response()->json([
                'status'  => 1,
                'message' => "Đăng xuất thành công",
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Có lỗi xảy ra",
            ]);
        }
    }

    public function dangXuatAll(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\KhachHang) {
            if ($user) {
                $ds_token = $user->tokens;
                foreach ($ds_token as $key => $value) {
                    $value->delete();
                }
                return response()->json([
                    'status'  => 1,
                    'message' => "Đăng xuất thành công",
                ]);
            } else {
                return response()->json([
                    'status'  => 0,
                    'message' => "Có lỗi xảy ra",
                ]);
            }
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Bạn không có quyền thực hiện chức năng này!",
            ]);
        }
    }

    public function quenMK(Request $request)
    {
        $user = KhachHang::where('email', $request->email)->first();
        if ($user) {
            $ma_khoi_phuc = Str::uuid();
            $x['ho_va_ten']     = $user->ho_va_ten;
            $x['ma_khoi_phuc'] = $ma_khoi_phuc;
            $x['email'] = $user->email;
            $user->hash_reset = $ma_khoi_phuc;
            $user->save();

            jobGuiMail::dispatch($request->email, 'Mail khôi phục mật khẩu ', $x, 'mail_2');
            return response()->json([
                'status' => true,
                'message' => 'Gửi mail khôi phục mật khẩu thành công. Vui lòng kiểm tra email của bạn',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Email không tồn tại trong hệ thống',
            ]);
        }
    }

    public function layLaiMK(Request $request){
        $user = KhachHang::where('hash_reset', $request->ma_khoi_phuc)->first();
        if ($user) {
            $user->password = $request->password;
            $user->hash_reset = null;
            $user->save();
            return response()->json([
                'status' => true,
                'message' => 'Khôi phục mật khẩu thành công',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Mã khôi phục không hợp lệ',
            ]);
        }
    }

}
