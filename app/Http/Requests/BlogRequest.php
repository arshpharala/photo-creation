<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        
        $blog=request()->route('blog',0);
        
        $id = 0;
        if(!empty($blog)){
            $id = $blog->id;
        }
      return [
          'title'                  => 'required|max:100',
          'post_date'              => 'required',
          // 'type'                   => 'required',
        //   'reference'              => 'required|unique:blogs,reference,'.$id.',id',
          'image'                  => 'mimes:jpeg,png,jpg,svg|max:500',
        //   'meta_title'             => 'max:100|required',
        //   'meta_description'       => 'max:250|required',
      ];
    }
}
