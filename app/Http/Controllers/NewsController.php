<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        $all_news = News::with('category')->get();
        return view('news.index',compact('all_news'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('news.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $fileName="";
        if ($request->hasFile('image'))
        {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/news'),$fileName);
        }
        News::create([
            'title'=>$request->title,
            'text'=>$request->text,
            'image'=>$fileName,
            'category_id'=>$request->category_id,
        ]);
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.show',compact('news'));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::all();
        return view('news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Правила валидации
        $rules = [
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Пример ограничений на изображение
            'category_id' => 'required|exists:categories,id',
        ];

        // Сообщения об ошибках
        $messages = [
            'title.required' => 'Поле заголовка обязательно к заполнению.',
            'text.required' => 'Поле текста обязательно к заполнению.',
            'image.image' => 'Файл должен быть изображением.',
            'image.mimes' => 'Поддерживаются только изображения форматов: jpeg, png, jpg, gif.',
            'image.max' => 'Максимальный размер изображения: 40MB.',
            'category_id.required' => 'Поле категории обязательно к заполнению.',
            'category_id.exists' => 'Выбранная категория недействительна.',
        ];

        // Валидация
        $validator = Validator::make($request->all(), $rules, $messages);

        // Проверка на наличие ошибок валидации
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Находим новость по ID
        $news = News::findOrFail($id);

        // Обновление изображения, если оно было изменено
        if ($request->hasFile('image')) {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/news'), $fileName);
            $news->image = $fileName;
        }

        // Обновление остальных полей новости
        $news->title = $request->title;
        $news->text = $request->text;
        $news->category_id = $request->category_id;
        $news->save();

        return redirect()->route('news.index')->with('success', 'Новость успешно обновлена.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index');
    }
}
