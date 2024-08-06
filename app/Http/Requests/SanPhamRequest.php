<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return
            [
       
                'ten_san_pham' => 'required|max:255',
                'ma_san_pham' => 'required|max:10|unique:san_phams,ma_san_pham,' .  $this->route('id'),
                'gia_san_pham' => 'required|numeric|min:0|max:999999999',
                'gia_khuyen_mai' => 'numeric|min:0|lt:gia_san_pham',
                'so_luong' => 'required|integer|min:0',
                'hinh_anh' => 'image|mimes:jpg,jpeg,webp,gif,png',
                'mo_ta_ngan' => 'string|max:255',
                'ngay_nhap' => 'required|date',
                'danh_muc_id' => 'required|exists:danh_mucs,id',
                
            ];
    }

    public function messages(): array
    {
        return [
            'ma_san_pham.required' => 'Mã sản phẩm bắt buộc điền',
            'ma_san_pham.unique' => 'Mã sản phẩm không được trùng',
            'ma_san_pham.max' => 'Mã sản phẩm không được quá 10 ký tự',
            'ten_san_pham.required' => 'Tên sản phẩm bắt buộc điền',
            'ten_san_pham.max' => 'Tên sản phẩm không được quá 100 ký tự',
            'gia_san_pham.required' => 'Giá sản phẩm bắt buộc điền',
            'gia_san_pham.numeric' => 'Giá sản phẩm phải là số',
            'gia_san_pham.min' => 'Giá sản phẩm không hợp lệ',
            'gia_san_pham.max' => 'Giá sản phẩm phải nhỏ hơn 99.999.999đ',
            'gia_khuyen_mai.numeric' => 'Giá khuyến mại phải là số',
            'gia_khuyen_mai.min' => 'Giá khuyến mại không hợp lệ',
            'gia_khuyen_mai.lt' => 'Giá khuyến mại không được lớn hơn giá sản phẩm',
            'hinh_anh.image' => 'Hình ảnh không hợp lệ',
            'hinh_anh.mimes' => 'Hình ảnh không hợp lệ',
            'so_luong.required' => 'Số lượng bắt buộc điền',
            'so_luong.integer' => 'Số lượng phải là số',
            'so_luong.min' => 'Số lượng không hợp lệ',
            'ngay_nhap.required' => 'Ngày nhập bắt buộc điền',
            'ngay_nhap.date' => 'Ngày nhập sai định dạng',
            'danh_muc_id.required' => 'Danh mục là bắt buộc',
            'danh_muc_id.exists' => 'Danh mục không hợp lệ',
            'mo_ta_ngan.string' => 'Mô tả không hợp lệ',
            'mo_ta_ngan.max' => 'Mô tả không được dài quá 255 kí tự',
        ];
    }

}
