<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Repositories\Article\ArticleRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\ArticleCategory\ArticleCategoryRepositoryInterface;
use App\Repositories\Image\ImageRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleRepository, $categoryRepository, $articleCategoryRepository, $imageRepository;

    public function __construct(
        ArticleRepositoryInterface $articleRepository,
        CategoryRepositoryInterface $categoryRepository,
        ArticleCategoryRepositoryInterface $articleCategoryRepository,
        ImageRepositoryInterface $imageRepository,
    ) {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
        $this->articleCategoryRepository = $articleCategoryRepository;
        $this->imageRepository = $imageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->articleRepository->getArticleWithCategory();
        // dd($articles);
        return view("admin.articles.adminBlogList", compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        return view('admin.articles.adminBlogCreate', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ArticleRequest $articleRequest)
    {
        $now = time();
        $ext = $request->file('FeatureImage')->extension();
        $name = $request->file('FeatureImage')->getClientOriginalName();
        $final_name = 'FeatureImage_' . $now . '.' . $ext;
        $request->file('FeatureImage')->move(public_path('uploads/'), $final_name);
        $image = $this->imageRepository->create([
            'url' => $final_name,
            'name' => $name,
            'description' => "image {$name}",
        ]);

        $article = $this->articleRepository->create([
            'user_id' => Auth::id(),
            'image_id' => $image->id,
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        $this->articleCategoryRepository->create([
            'category_id' => $request->category_id,
            'article_id' => $article->id,
        ]);

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_id = '';
        $urlImage = '';

        $article = $this->articleRepository->find($id);

        $images = $this->imageRepository->getAll();
        foreach ($images as $key => $value) {
            if ($article->image_id == $value->id) {
                $urlImage = $value->url;
            }
        }

        $categories = $this->categoryRepository->getAll();

        $articleCategory = $this->articleCategoryRepository->getAll();
        foreach ($articleCategory as $key => $value) {
            if ($value->article_id == $id) {
                $category_id = $value->category_id;
            }
        }

        return view('admin.articles.adminBlogUpdate', compact(['article', 'category_id', 'categories', 'urlImage']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, $id)
    {
        if ($request->hasFile('NewFeatureImage')) {
        }

        # update category
        $articleCategory = $this->articleCategoryRepository->getAll();
        foreach ($articleCategory as $key => $value) {
            if ($request->category != $value->category_id) {
                $this->articleCategoryRepository->update($id, [
                    'category_id' => $request->category
                ]);
            }
        }

        # update article
        $this->articleRepository->update($id, [
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
