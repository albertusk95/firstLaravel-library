<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Book; // call model 
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
	/**
    * Display a listing of the resource.
    *
    * @return Response
    */
	public function index()
	{
		$books=Book::all();
        return view('books.index',compact('books'));
    }
	
	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function create()
	{
		return view('books.create');// ini halaman view
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$book=Request::all();
		Book::create($book);//ini insert ke database
		return redirect('books');
	}

	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function show($id)
	{
		$book=Book::find($id);
		return view('books.show',compact('book'));
	}

	public function edit($id)
	{
		$book=Book::find($id);
		return view('books.edit',compact('book'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$bookUpdate=Request::all();
		$book=Book::find($id);
		$book->update($bookUpdate);
		return redirect('books');
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function destroy($id)
	{
		Book::find($id)->delete();
		return redirect('books');
	}
}
