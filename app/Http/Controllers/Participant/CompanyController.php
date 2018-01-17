<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(CompanyRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Company';
        $companies = $this->repo->getPaginateByUser(auth()->user()['id']);
        $data = [
            'title' => $title,
            'content_title' => $title,
            'active_page' => 'company',
            'companies' => $companies,
        ];
        return view('participant::company.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create a company';
        $data = [
            'title' => $title,
            'content_title' => $title,
        ];
        return view('participant::company.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_runValidate($request);

        $this->repo->baseCreate($request->all());

        return redirect()->route('participant.company.index')->withMessage([
            'type' => 'success',
            'message' => 'Company created successfully!',
        ]);
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
        $company = $this->repo->getDetail($id);
        if (!$company) {
            abort(404, 'Company not found');
        }

        $title = 'Edit a company: ' . $company['name'];
        $data = [
            'title' => $title,
            'content_title' => $title,
            'company' => $company,
        ];
        return view('participant::company.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->_runValidate($request, $id);

        $this->repo->baseUpdate($id, $request->all());

        return redirect()->route('participant.company.index')->withMessage([
            'type' => 'success',
            'message' => 'Company updated successfully!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->delete($id);

        return redirect()->route('participant.company.index')->withMessage([
            'type' => 'success',
            'message' => 'Company deleted successfully!',
        ]);
    }

    protected function _runValidate(Request $request, $forgetId = null)
    {
        $forgetId = $forgetId ?: 'NULL';
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'slug' => 'required|alpha_dash|unique:companies,slug,' . $forgetId,
            'services.*.name' => 'required',
            'services.*.image' => 'image',
        ];

        $this->validate($request, $rules, [], [
            'name' => 'Name',
            'description' => 'Deskripsi',
            'services.*.name' => 'Service Name',
        ]);
    }

    public function invite()
    {
        $title = 'Invite a Participant';
        $data = [
            'title' => $title,
            'active_page' => 'participant_invite',
            'company_dropdown' => $this->repo->getDropdownByUser(auth()->user()['id']),
            'subject_placeholder' => 'Invitation from __company__',
            'message_placeholder' => $this->_messagePlaceholder(),
        ];
        return view('participant::company.invite', $data);
    }

    public function inviteProcess(Request $request)
    {
        // $mail_content = new ParticipantInvitation($request->all());
        // if ($request->get('preview')) {
        //     return $mail_content;
        // }

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'company_id' => 'required',
            // 'subject' => 'required',
            // 'message' => 'required',
        ]);

        // Mail::to($request->get('email'))->send($mail_content);

        $this->_sendInvitationViaSendgrid($request);

        return redirect()->route('participant.company.invite')->withMessage([
            'type' => 'success',
            'message' => 'Invitation has been sent to "' . $request->get('email') . '" successfully!',
        ]);
    }

    public function _sendInvitationViaSendgrid($request)
    {
        $invitation_url = route('register', [
            'ref_company' => $request->get('company_id'),
            'email' => $request->get('email'),
            'name' => $request->get('name'),
        ]);
        $company = Company::find($request->get('company_id'));
        $emailData = json_encode(
            [
                '-senderName-' => auth()->user()->name,
                '-companyName-' => $company->name,
                '-invitationLink-' => $invitation_url,
                '-targetName-' => $request->get('name'),
            ]
        );

        sendMail(
            'noreply@sejutasuryaatap.com',
            'noreply',
            $request->get('email'),
            $request->get('name'),
            'Invitation',
            null,
            $emailData,
            null,
            '8a59a904-78c1-4019-bc1e-69fd6e2efb07'
        );
    }

    protected function _messagePlaceholder()
    {
        return 'Hello __name__,

I would like to invite you to join my company: __company__.

Click a link below:';
    }
}
