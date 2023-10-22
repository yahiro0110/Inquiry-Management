<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // 入力フォームの項目
    private $formItems = ['first_name', 'last_name', 'gender', 'email', 'postal', 'address', 'building_name', 'opinion'];

    /**
     * お問い合わせ一覧画面を表示する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 検索フォームからのリクエストデータを取得
        $fullname = $request->input('fullname');
        $gender = $request->input('gender');
        $firstDate = $request->input('first_date');
        $lastDate = $request->input('last_date');
        $email = $request->input('email');

        // クエリを初期化
        $query = Contact::query();

        // 各条件をクエリに追加
        if (!empty($fullname)) {
            $query->where('fullname', 'LIKE', "%$fullname%");
        }
        if (!empty($gender)) {
            if ($gender === 'male') {
                $query->where('gender', 1);
            } elseif ($gender === 'female') {
                $query->where('gender', 2);
            }
        }
        if (!empty($firstDate)) {
            $query->whereDate('created_at', '>=', $firstDate);
        }
        if (!empty($lastDate)) {
            $query->whereDate('created_at', '<=', $lastDate);
        }
        if (!empty($email)) {
            $query->where('email', 'LIKE', "%$email%");
        }

        // クエリを実行
        $results = $query->paginate(10);

        // クエリパラメータをページネーションリンクに含める
        $results->appends($request->all());

        return view('admin.index', ['contacts' => $results]);
    }

    /**
     * お問い合わせ入力画面を表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * 入力フォームの情報をセッションに保存する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post(ContactRequest $request)
    {
        $input = $request->only($this->formItems);
        // 郵便番号の値を半角に変換する
        $input['postal'] = mb_convert_kana($input['postal'], 'an');
        $request->session()->put('form_input', $input);
        return redirect()->route('contact.confirm');
    }

    /**
     * お問い合わせ確認画面を表示する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {
        $input = $request->session()->get('form_input');
        if (!$input) {
            return redirect()->route('contact.create');
        }
        return view('user.confirm', ['contact' => $input]);
    }

    /**
     * お問い合わせ入力画面へ戻る
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function back(Request $request)
    {
        $input = $request->session()->get('form_input');
        if (!$input) {
            return redirect()->route('contact.create');
        }
        return redirect()->route('contact.create')->withInput($input);
    }

    /**
     * Contactsテーブルにレコードを追加する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->session()->get('form_input');
        if (!$input) {
            return redirect()->route('contact.create');
        }

        // レコード登録用に氏名のデータを加工
        $input['fullname'] = $input['first_name'] . $input['last_name'];
        unset($input['first_name'], $input['last_name']);
        // レコード登録用に性別のデータを加工
        $input['gender'] = ($input['gender'] == 'male') ? 1 : 2;

        Contact::create($input);

        // セッション情報の削除
        $request->session()->forget('form_input');

        return view('user.thanks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Contactsテーブルからレコードを削除する
     *
     * @param int $id 連絡先ID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('contact.index')->with('message', 'Data deleted successfully');
    }
}
