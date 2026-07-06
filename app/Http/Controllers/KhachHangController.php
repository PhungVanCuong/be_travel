<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachHangDangKyRequest;
use App\Models\KhachHang;
use App\Models\PhanQuyen;
use App\Jobs\jobGuiMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
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
            'is_active'     => $request->is_active,
            'is_block'      => $request->is_block
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
            'is_active'     => $request->is_active,
            'is_block'      => $request->is_block
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

    public function dangNhapGoogle(Request $request)
    {
        $credential = $request->credential;
        if (!$credential) {
            return response()->json([
                'status'  => false,
                'message' => 'Dữ liệu Google không hợp lệ.',
            ]);
        }

        $response = Http::get('https://oauth2.googleapis.com/tokeninfo', [
            'id_token' => $credential,
        ]);

        if ($response->failed()) {
            return response()->json([
                'status'  => false,
                'message' => 'Xác thực Google thất bại.',
            ]);
        }

        $data = $response->json();
        if (empty($data['email']) || empty($data['sub'])) {
            return response()->json([
                'status'  => false,
                'message' => 'Xác thực Google không đầy đủ thông tin.',
            ]);
        }

        if (isset($data['email_verified']) && $data['email_verified'] !== 'true') {
            return response()->json([
                'status'  => false,
                'message' => 'Email Google chưa được xác minh.',
            ]);
        }

        $email    = $data['email'];
        $googleId = $data['sub'];
        $name     = $data['name'] ?? null;
        $avatar   = $data['picture'] ?? null;

        $user = KhachHang::where('google_id', $googleId)
            ->orWhere('email', $email)
            ->first();

        if ($user) {
            if ($user->is_block == 1) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Tài khoản của bạn đang bị khóa.',
                ]);
            }

            if ($user->is_active == 0) {
                $user->is_active = 1;
            }
            if (!$user->google_id) {
                $user->google_id = $googleId;
            }
            if ($avatar) {
                $user->avatar = $avatar;
            }
            if (!$user->ho_va_ten && $name) {
                $user->ho_va_ten = $name;
            }
            $user->save();
        } else {
            $user = KhachHang::create([
                'ho_va_ten' => $name,
                'email'     => $email,
                'avatar'    => $avatar,
                'google_id' => $googleId,
                'password'  => "123456", // Mật khẩu mặc định vì đăng nhập bằng Google
                'is_active' => 1,
                'is_block'  => 0,
            ]);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Đăng nhập bằng Google thành công.',
            'token'   => $user->createToken('key_client')->plainTextToken,
        ]);
    }

    public function dangNhapFacebook(Request $request)
    {
        $accessToken = $request->access_token ?? null;
        if (!$accessToken) {
            return response()->json([
                'status' => false,
                'message' => 'Dữ liệu Facebook không hợp lệ.',
            ]);
        }

        // Lấy thông tin user từ Graph API
        $response = Http::get('https://graph.facebook.com/me', [
            'fields' => 'id,name,email,picture',
            'access_token' => $accessToken,
        ]);

        if ($response->failed()) {
            return response()->json([
                'status' => false,
                'message' => 'Xác thực Facebook thất bại.',
            ]);
        }

        $data = $response->json();
        $facebookId = $data['id'] ?? null;
        $email = $data['email'] ?? null;
        $name = $data['name'] ?? null;
        $avatar = $data['picture']['data']['url'] ?? null;

        if (!$facebookId) {
            return response()->json([
                'status' => false,
                'message' => 'Xác thực Facebook thất bại (không có id).',
            ]);
        }

        // If email is not provided by Facebook (possible), try to find user by facebook_id.
        if (empty($email)) {
            $user = KhachHang::where('facebook_id', $facebookId)->first();
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Tài khoản Facebook không cung cấp email. Vui lòng sử dụng đăng nhập khác hoặc cấp quyền email cho app.',
                ]);
            }
        } else {
            $user = KhachHang::where('facebook_id', $facebookId)
                ->orWhere('email', $email)
                ->first();
        }

        if ($user) {
            if ($user->is_block == 1) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Tài khoản của bạn đang bị khóa.',
                ]);
            }

            if ($user->is_active == 0) {
                $user->is_active = 1;
            }
            if (!$user->facebook_id) {
                $user->facebook_id = $facebookId;
            }
            if ($avatar) {
                $user->avatar = $avatar;
            }
            if (!$user->ho_va_ten && $name) {
                $user->ho_va_ten = $name;
            }
            $user->save();
        } else {
            $user = KhachHang::create([
                'ho_va_ten' => $name,
                'email'     => $email,
                'avatar'    => $avatar,
                'facebook_id' => $facebookId,
                'password'  => "123456",
                'is_active' => 1,
                'is_block'  => 0,
            ]);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Đăng nhập bằng Facebook thành công.',
            'token'   => $user->createToken('key_client')->plainTextToken,
        ]);
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

    public function dangKy(\App\Http\Requests\KhachHangDangKyRequest $request)
    {
        // Tạo ngẫu nhiên một mã xác nhận 6 số
        $ma_kich_hoat = rand(100000, 999999);

        KhachHang::create([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'password'      => $request->password,
            'cccd'          => $request->cccd,
            'ngay_sinh'     => $request->ngay_sinh,
            'is_active'     => 0, // Mặc định chưa kích hoạt
            'is_block'      => 0,
            'hash_reset'    => $ma_kich_hoat // Lưu tạm mã kích hoạt vào đây
        ]);

        $x['ho_va_ten']     = $request->ho_va_ten;
        $x['email']         = $request->email;
        $x['ma_kich_hoat']  = $ma_kich_hoat;

        // Gửi mail
        jobGuiMail::dispatch($request->email, 'Mã kích hoạt tài khoản IXTAL TOUR', $x, 'mail');

        return response()->json([
            'status' => true,
            'message' => 'Vui lòng kiểm tra email để lấy mã xác nhận!',
        ]);
    }

    public function xacNhanDangKy(Request $request)
    {
        // Khách hàng phải truyền email và mã xác nhận
        $user = KhachHang::where('email', $request->email)
                         ->where('hash_reset', $request->ma_kich_hoat)
                         ->first();

        if ($user) {
            // Cập nhật trạng thái và xóa mã
            $user->is_active = 1; // Kích hoạt tài khoản
            $user->hash_reset = null;
            $user->save();

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

    public function checkToken(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user) {
            // Đếm số lượng hóa đơn chưa thanh toán (trạng thái = 1)
            $so_luong_chua_tt = \App\Models\HoaDon::where('id_khach_hang', $user->id)
                                        ->where('trang_thai', '1')
                                        ->count();

            return response()->json([
                'status' => true,
                'ho_ten' => $user->ho_va_ten,
                'email'  => $user->email,
                'avatar' => $user->avatar,
                'so_hoa_don_chua_tt' => $so_luong_chua_tt, // Thêm dòng này để trả về FE
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
