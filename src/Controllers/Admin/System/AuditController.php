<?php

namespace Ikodota\Yeoman\Controllers\Admin\System;

use Ikodota\Yeoman\Models\Audit;
use Illuminate\Http\Request;
use Ikodota\Yeoman\Controllers\Admin\Controller;
use Illuminate\Support\Facades\Gate;

class AuditController extends Controller
{
    public  function index()
    {
        if (Gate::foruser($this->loggedUser())->denies('admin.audit.read')) {
            abort(403);
        }

        $audits = Audit::orderby('created_at','desc')->paginate(5);

        return view('yeoman::backend.audit.index', compact('audits'));
    }


    public function logs($uuid)
    {
        $audit = Audit::where('id',$uuid)->first();

        $item_model = "\\".$audit->auditable_type;
        $item_id = $audit->auditable_id;

        $audits = $item_model::find($item_id)->audits()->orderby('created_at','desc')->paginate(5);

        /*$item=$item_model::find($item_id);
        $audits = $item->audits->sortBy('created_at')->reverse();
        */

        return view('yeoman::backend.audit.logs', compact('audits'));
    }
}
