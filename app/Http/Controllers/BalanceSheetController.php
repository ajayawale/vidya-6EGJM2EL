<?php

namespace App\Http\Controllers;

use App\Models\BalanceSheet;
use DataTables;
use Illuminate\Http\Request;

class BalanceSheetController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		return view('view_balance_sheet');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	public function data(Request $r) {
		$r->all();
		$bal = BalanceSheet::orderBy('bs_created_at', 'desc');

		if ($r->startDate && $r->endDate) {
			$bal->where('bs_date', '>=', date('d-m-Y', strtotime($r->startDate)))->get();
			$bal->where('bs_date', '<=', date('d-m-Y', strtotime($r->endDate)))->get();
		}
		if ($r->startDate && empty($r->endDate)) {
			$bal->where('bs_date', '>=', date('d-m-Y', strtotime($r->startDate)))->get();
		}
		if (empty($r->startDate) && $r->endDate) {
			$bal->where('bs_date', '<=', date('d-m-Y', strtotime($r->endDate)))->get();
		}
		return DataTables::of($bal)->make(true);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
