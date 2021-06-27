<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers;

use App\Gender;
use App\Http\Requests\MemberRequest;
use App\Member;

use App\RelationshipStatus;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $members = Member::all()->sortBy('name');

        return view('members.index', ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $relationshipStatuses = RelationshipStatus::all();
        $genders = Gender::all();

        return view('members.create', ['relationshipStatuses' => $relationshipStatuses, 'genders' => $genders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MemberRequest $request
     * @return RedirectResponse
     */
    public function store(MemberRequest $request): RedirectResponse
    {
        Member::create($request->all());

        toast('Membro cadastrado com sucesso!','success');

        return redirect()->route('members.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $member = Member::find($id);

        return view('members.show', ['member' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Member $member
     * @return View
     */
    public function edit(Member $member): View
    {
        $relationshipStatuses = RelationshipStatus::all();
        $genders = Gender::all();

        return view('members.edit', ['member' => $member, 'relationshipStatuses' => $relationshipStatuses, 'genders' => $genders]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MemberRequest $request
     * @param Member $member
     * @return RedirectResponse
     */
    public function update(MemberRequest $request, Member $member): RedirectResponse
    {
        $member->update($request->all());

        toast('Membro atualizado com sucesso!','success');

        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Member $member
     * @return null
     * @throws Exception
     */
    public function destroy(Member $member)
    {
        $member->delete();

        toast('Membro removido com sucesso!','success');

        return redirect()->route('members.index');
    }
}
