<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangDangKyRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'ho_va_ten'       => 'required|string|max:255',
            'email'           => 'required|email|unique:khach_hangs,email',
            'so_dien_thoai'   => 'required|string|digits:10',
            'password'        => 'required|string|min:6',
            're_password'     => 'required|same:password',
            'cccd'            => 'required|string|digits:12|unique:khach_hangs,cccd',
            'ngay_sinh'       => 'required|date',
        ];
    }
    public function messages(): array
    {
        return [
            'ho_va_ten.required' => 'Họ và tên là bắt buộc',
            'ho_va_ten.string' => 'Họ và tên phải là chuỗi',
            'ho_va_ten.max' => 'Họ và tên không được vượt quá 255 ký tự',
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'so_dien_thoai.required' => 'Số điện thoại là bắt buộc',
            'so_dien_thoai.string' => 'Số điện thoại phải là chuỗi',
            'so_dien_thoai.digits' => 'Số điện thoại phải có 10 chữ số',
            'password.required' => 'Mật khẩu là bắt buộc',
            'password.string' => 'Mật khẩu phải là chuỗi',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            're_password.required' => 'Xác nhận mật khẩu là bắt buộc',
            're_password.same' => 'Xác nhận mật khẩu không khớp',
            'cccd.required' => 'CCCD là bắt buộc',
            'cccd.string' => 'CCCD phải là chuỗi',
            'cccd.digits' => 'CCCD phải có 12 chữ số',
            'cccd.unique' => 'CCCD đã tồn tại',
            'ngay_sinh.required' => 'Ngày sinh là bắt buộc',
            'ngay_sinh.date' => 'Ngày sinh phải là ngày',
        ];
    }
}
