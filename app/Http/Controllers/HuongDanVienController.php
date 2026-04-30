<?php

namespace App\Http\Controllers;

use App\Models\HuongDanVien;
use App\Models\PhanQuyen;
use App\Jobs\jobGuiMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HuongDanVienController extends Controller
{
    /**
     * ======================================================================
     * DÀNH CHO ADMIN: QUẢN LÝ DANH SÁCH HƯỚNG DẪN VIÊN
     * ======================================================================
     */
    public function getData()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 14;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $data = HuongDanVien::all();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu hướng dẫn viên thành công',
            'data'    => $data,
        ]);
    }

public function addData(Request $request)
{
    $user = Auth::guard('sanctum')->user();
    if ($user->is_master != 1) {
        $id_chuc_nang = 14;
        $id_chuc_vu   = $user->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
    }

    HuongDanVien::create([
        'email'         => $request->email,
        'ho_va_ten'     => $request->ho_va_ten,
        'password'      => $request->password,
        'ngon_ngu'      => $request->ngon_ngu ?? 'Tiếng Việt',
        'so_dien_thoai' => $request->so_dien_thoai,
        // Lấy avatar mặc định giống hệt trong Seeder nếu Frontend không gửi lên
        'avatar'        => $request->avatar ?? 'https://i.pinimg.com/736x/56/72/d6/5672d634f75f75edb6e8cd3de03f099e.jpg',
        'is_active'     => $request->is_active ?? 1,
        'is_block'      => 0,
    ]);

    return response()->json([
        'status'  => true,
        'message' => 'Thêm hướng dẫn viên ' . $request->ho_va_ten . ' thành công',
    ]);
}
public function update(Request $request)
{
    $user = Auth::guard('sanctum')->user();
    if ($user->is_master != 1) {
        $id_chuc_nang = 14;
        $id_chuc_vu   = $user->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
    }

    $hdv = HuongDanVien::find($request->id);
    if ($hdv) {
        $dataUpdate = [
            'email'         => $request->email,
            'ho_va_ten'     => $request->ho_va_ten,
            'so_dien_thoai' => $request->so_dien_thoai,
            'ngon_ngu'      => $request->ngon_ngu ?? 'Tiếng Việt',
            'is_active'     => $request->is_active ?? $hdv->is_active,
        ];

        // Nếu có nhập mật khẩu mới thì mới update
        if (!empty($request->password)) {
            $dataUpdate['password'] = $request->password;
        }

        $hdv->update($dataUpdate);

        return response()->json([
            'status'  => true,
            'message' => 'Cập nhật hướng dẫn viên ' . $request->ho_va_ten . ' thành công'
        ]);
    }

    return response()->json([
        'status'  => false,
        'message' => 'Hướng dẫn viên không tồn tại'
    ]);
}
    public function destroy(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 14;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $hdv = HuongDanVien::find($request->id);
        if ($hdv) {
            $hdv->delete();
            return response()->json([
                'status'  => true,
                'message' => 'Xóa hướng dẫn viên thành công'
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Hướng dẫn viên không tồn tại'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 14;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $hdv = HuongDanVien::find($request->id);
        if ($hdv) {
            $hdv->update(['tinh_trang' => $request->tinh_trang]);
            return response()->json([
                'status'  => true,
                'message' => 'Thay đổi trạng thái hướng dẫn viên thành công'
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Hướng dẫn viên không tồn tại'
        ]);
    }

    /**
     * ======================================================================
     * DÀNH CHO HƯỚNG DẪN VIÊN: ĐĂNG NHẬP, ĐĂNG KÝ, QUÊN MẬT KHẨU
     * ======================================================================
     */

    public function dangNhap(Request $request)
    {
        $check = HuongDanVien::where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if ($check) {
            if ($check->is_active == 0) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Tài khoản của bạn chưa được kích hoạt!',
                ]);
            }

            if ($check->is_block == 1) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Tài khoản của bạn đã bị khóa!',
                ]);
            }

            return response()->json([
                'status'  => true,
                'message' => 'Đăng nhập thành công',
                'token'   => $check->createToken('key_hdv')->plainTextToken,
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Tài khoản sai email hoặc password',
            ]);
        }
    }

    public function dangKy(Request $request)
    {
        // Tạo ngẫu nhiên mã xác nhận 6 số
        $ma_kich_hoat = rand(100000, 999999);

        HuongDanVien::create([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'ngon_ngu'      => $request->ngon_ngu ?? 'Tiếng Việt', // Mặc định nếu không có
            'password'      => $request->password,
            'is_active'     => 0, // Chưa kích hoạt
            'is_block'      => 0,
            'hash_reset'    => $ma_kich_hoat
        ]);

        $x['ho_va_ten']     = $request->ho_va_ten;
        $x['email']         = $request->email;
        $x['ma_kich_hoat']  = $ma_kich_hoat;

        jobGuiMail::dispatch($request->email, 'Mã kích hoạt tài khoản Hướng Dẫn Viên', $x, 'mail');

        return response()->json([
            'status' => true,
            'message' => 'Đăng ký thành công! Vui lòng kiểm tra email để lấy mã xác nhận.',
        ]);
    }

    public function xacNhanDangKy(Request $request)
    {
        $hdv = HuongDanVien::where('email', $request->email)
                           ->where('hash_reset', $request->ma_kich_hoat)
                           ->first();

        if ($hdv) {
            $hdv->is_active = 1;
            $hdv->hash_reset = null;
            $hdv->save();

            return response()->json([
                'status'  => true,
                'message' => 'Kích hoạt tài khoản thành công! Bạn có thể đăng nhập ngay.',
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Mã xác nhận không hợp lệ hoặc email không đúng!',
            ]);
        }
    }

    public function quenMK(Request $request)
    {
        $hdv = HuongDanVien::where('email', $request->email)->first();
        if ($hdv) {
            $ma_khoi_phuc = Str::uuid();
            $x['ho_va_ten']     = $hdv->ho_va_ten;
            $x['ma_khoi_phuc']  = $ma_khoi_phuc;
            $x['email']         = $hdv->email;

            $hdv->hash_reset = $ma_khoi_phuc;
            $hdv->save();

            jobGuiMail::dispatch($request->email, 'Khôi phục mật khẩu Hướng Dẫn Viên', $x, 'mail_2');
            return response()->json([
                'status' => true,
                'message' => 'Gửi mail khôi phục mật khẩu thành công. Vui lòng kiểm tra email của bạn.',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Email không tồn tại trong hệ thống',
            ]);
        }
    }

    public function layLaiMK(Request $request)
    {
        $hdv = HuongDanVien::where('hash_reset', $request->ma_khoi_phuc)->first();
        if ($hdv) {
            $hdv->password = $request->password;
            $hdv->hash_reset = null;
            $hdv->save();

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

    /**
     * ======================================================================
     * DÀNH CHO HƯỚNG DẪN VIÊN ĐÃ ĐĂNG NHẬP: PROFILE, ĐỔI MẬT KHẨU, ĐĂNG XUẤT
     * ======================================================================
     */

    public function checkToken(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\HuongDanVien) {
            return response()->json([
                'status' => true,
                'ho_ten' => $user->ho_va_ten,
                'email'  => $user->email,
                // Trả thêm nếu có cột avatar
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập hoặc token hết hạn.',
            ]);
        }
    }

    public function getProfile(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\HuongDanVien) {
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
        if ($user && $user instanceof \App\Models\HuongDanVien) {
            $user->update([
                'ho_va_ten'     => $request->ho_va_ten,
                'so_dien_thoai' => $request->so_dien_thoai,
                'ngon_ngu'      => $request->ngon_ngu,
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

    public function doiMatKhau(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\HuongDanVien) {
            if ($user->password != $request->password) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Mật khẩu hiện tại không đúng. Vui lòng nhập lại.'
                ]);
            } else {
                if ($request->new_password != $request->confirm_password) {
                    return response()->json([
                        'status'    =>  0,
                        'message'   =>  'Mật khẩu mới và xác nhận không khớp. Vui lòng nhập lại.'
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

    public function dangXuat(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\HuongDanVien) {
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
        if ($user && $user instanceof \App\Models\HuongDanVien) {
            $ds_token = $user->tokens;
            foreach ($ds_token as $key => $value) {
                $value->delete();
            }
            return response()->json([
                'status'  => 1,
                'message' => "Đăng xuất tất cả thiết bị thành công",
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Bạn không có quyền thực hiện chức năng này!",
            ]);
        }
    }
}
