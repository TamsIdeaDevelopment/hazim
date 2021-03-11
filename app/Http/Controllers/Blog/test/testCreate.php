<?php


namespace App\Http\Controllers\Blog\test;


use App\Blog;
use Illuminate\Http\Request;

class testCreate
{
    /** @var Blog */
    private $blog;

    /**
     * testCreate constructor.
     * @param Blog $blog
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }


    public function create(Request $request)
    {
        $model = $this->blog->create([
            'blog_category_id' => $request->input('blog_category_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        return $model;
    }

    public function update($blog_id,Request $request)
    {

        $data = $this->blog->findOrFail($blog_id);

        $data->blog_category_id = $request->input('blog_category_id');
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->status = $request->input('status');

        $data->save();

        return $data;
    }

    public function delete($blog_id)
    {

        $data = $this->blog->findOrFail($blog_id);


        $data->delete();

        return $data;
    }
}
