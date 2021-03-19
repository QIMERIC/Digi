<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Config;
use Settings;

use Illuminate\Http\Request;

use App\Models\Stats\Character\Stat;

use App\Services\Stats\StatService;
use App\Services\CharacterManager;

use App\Http\Controllers\Controller;

class OpponentController extends Controller
{
    // index for opponents
    public function getOpponentIndex(Request $request)
    {
        $query = Stat::query();
        $data = $request->only(['name']);
        if(isset($data['name']))
            $query->where('name', 'LIKE', '%'.$data['name'].'%');
        return view('admin.opponents.opponent', [
            'stats' => $query->paginate(20)->appends($request->query()),
        ]);
    }

    /**
     * Shows the create opponent page.
     */
    public function getOpponentCreate()
    {
        return view('admin.opponents.create_edit_opponents', [
            'stat' => new Stats,
        ]);
    }

    /**
     * Shows the edit stat page.
     */
    public function getOpponentEdit($id)
    {
        $stat = Stat::find($id);
        if(!$stat) abort(404);
        return view('admin.opponents.create_edit_opponents', [
            'stat' => $stat,
        ]);
    }

     /**
     * Creates or edits an stat.
     */
    public function postCreateEditStat(Request $request, StatService $service, $id = null)
    {
        $id ? $request->validate(Stat::$updateRules) : $request->validate(Stat::$createRules);
        $data = $request->only([
            'name', 
        ]);
        if($id && $service->updateStat(Stat::find($id), $data)) {
            flash('Stat updated successfully.')->success();
        }
        else if (!$id && $stat = $service->createStat($data, Auth::user())) {
            flash('Stat created successfully.')->success();
            return redirect()->to('admin/stats/edit/'.$stat->id);
        }
        else {
            foreach($service->errors()->getMessages()['error'] as $error) flash($error)->error();
        }
        return redirect()->back();
    }

    /**
     * Gets the stat deletion modal.
     *
     */
    public function getDeleteStat($id)
    {
        $stat = Stat::find($id);
        return view('admin.stats.character._delete_stat', [
            'stat' => $stat,
        ]);
    }

    /**
     * Creates or edits an stat.
     *
     */
    public function postDeleteStat(Request $request, StatService $service, $id)
    {
        if($id && $service->deleteStat(Stat::find($id))) {
            flash('Stat deleted successfully.')->success();
        }
        else {
            foreach($service->errors()->getMessages()['error'] as $error) flash($error)->error();
        }
        return redirect()->to('admin/stats');
    }

}
