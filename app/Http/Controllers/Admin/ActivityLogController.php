<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use DataTables;
use App\User;

class ActivityLogController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Activity::latest();
            return Datatables::of($data)
                ->editColumn('s', function($data){
                    if($data->subject_id == null){ return null; } 
                    return ['subject_id' => $data->subject_id, 'subject_type' => $data->subject_type ];
                })
                ->editColumn('c', function($data){
                    if($data->causer_id == null){ return null; }
                    return ['causer_id' => $data->causer_id, 
                            'causer_name' => $this->getUserName($data->causer_id), 
                            'causer_type' => $data->causer_type, 
                            'causer_role' => $this->getRoleUser($data->causer_id)
                        ];
                })
                ->editColumn('created_at', function($data){
                    return $this->timeAgo($data->created_at);
                })
                ->addColumn('action', function($row){
                    $btn = '<button type="button" data-id="/admin/activity/'.$row->id.'" class="detail btn btn-primary btn-sm mr-1 detailBtn">Detail</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $data = Activity::latest()->get();
        return view('admin.activity_log.activity');
    }

    public function show($id){
        $user = Activity::where('id', $id)->first();
        return response()->json($user->properties);
    }

    public function getUserName($userid){
        $user = User::where('id',$userid)->first();
        return $user->name;
    }

    public function getRoleUser($userid){
        $user = User::where('id',$userid)->first();
        return $user->role;
    }

    public function timeAgo($time_ago){
        // date_default_timezone_set('Asia/Jakarta');
        $time_ago = strtotime($time_ago);
        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60){
            return "baru saja";
        }
        //Minutes
        else if($minutes <=60){
            if($minutes==1){
                return "one minute ago";
            }
            else{
                return "$minutes minutes ago";
            }
        }
        //Hours
        else if($hours <=24){
            if($hours==1){
                return "one hour ago";
            }else{
                return "$hours hours ago";
            }
        }
        //Days
        else if($days <= 7){
            if($days==1){
                return "tomorrow";
            }else{
                return "$days days ago";
            }
        }
        //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                return "one week ago";
            }else{
                return "$weeks weeks ago";
            }
        }
        //Months
        else if($months <=12){
            if($months==1){
                return "one month ago";
            }else{
                return "$months months ago";
            }
        }
        else if($years >= 49){
            return "never logged in";
        }
        //Years
        else{
            if($years==1){
                return "one year ago";
            }else{
                return "$years years ago";
            }
        }
    }
}
