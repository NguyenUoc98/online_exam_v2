<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Semester;
use App\Models\Slide;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $semesters = Semester::all();
        $slides = Slide::all();
        return view('page.home', compact('semesters', 'slides'));
    }

    public function news()
    {
        return view('page.news');
    }

    public function page($slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();
        return view('page.show', compact('page'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('page.profile.index', compact('user'));
    }

    /**
     * Cập nhật thông tin tài khoản
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name'    => 'required|max:60',
            'email'        => 'required|email',
            'subject_id'   => 'required',
            'teacher_id'   => 'required',
            'time'         => 'required|numeric|min:5',
            'num_question' => 'required|numeric|min:10'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'name'  => $request->get('user_name'),
            'email' => $request->get('email'),
        ];

        if ($request->hasFile('avatar')) {
            $fileName = md5(auth()->id()) . '.png';
            $path = 'users/' . Carbon::now()->format('MY');
            if (Storage::disk('public')->exists($path . '/' . $fileName)) {
                Storage::disk('public')->delete($path . '/' . $fileName);
            }
            Storage::disk('public')->putFileAs($path, $request->file('avatar'), $fileName);
            $data = array_merge($data, ['avatar' => $path . '/' . $fileName]);
        }

        if (auth()->user()->update($data)) {
            return redirect()->back()->with([
                'notify' => [
                    'title' => 'Thành công',
                    'msg'   => 'Cập nhật thành công thông tin tài khoản',
                    'icon'  => 'success'
                ]
            ]);
        } else {
            return redirect()->back()->with([
                'notify' => [
                    'title' => 'Lỗi',
                    'msg'   => 'Có lỗi khi cập nhật thông tin tài khoản',
                    'icon'  => 'error'
                ]
            ]);
        }
    }

    /**
     * Cập nhật mật khẩu
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|different:old_password',
            're_password'  => 'required|same:new_password',
        ],[
            're_password.same' => 'Mật khẩu nhập lại không khớp',
            'new_password.different' => 'Mật khẩu mới phải khác mật khẩu hiện tại'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return redirect()->back()->with([
                'notify' => [
                    'title' => 'Lỗi',
                    'msg'   => 'Có vẻ như mật khẩu cũ bạn nhập không chính xác',
                    'icon'  => 'error'
                ]
            ]);
        } else {

            if (auth()->user()->update(['password' => Hash::make($request->new_password)])) {
                return redirect()->back()->with([
                    'notify' => [
                        'title' => 'Thành công',
                        'msg'   => 'Cập nhật thành công thông tin tài khoản',
                        'icon'  => 'success'
                    ]
                ]);
            } else {
                return redirect()->back()->with([
                    'notify' => [
                        'title' => 'Lỗi',
                        'msg'   => 'Có lỗi khi cập nhật thông tin tài khoản',
                        'icon'  => 'error'
                    ]
                ]);
            }
        }
    }
}
