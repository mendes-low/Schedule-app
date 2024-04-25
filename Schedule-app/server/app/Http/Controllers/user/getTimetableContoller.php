<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Timetable;
use App\Models\User;
use Illuminate\Http\Request;

class getTimetableContoller extends Controller
{
    public function getTable(Request $request)
    {
        $token = $request->header('token');
        $user = User::where(['api_token' => $token])->first();
        $group_data = Timetable::where('group_id', $user->group_id)->get()->toArray();

        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $array = [];
        for($i = 0 ; $i < 7; $i++){
           foreach ($group_data as $item){
               if($item['day'] == $days[$i]){
                   $array[$days[$i]][] = $item;
               }
           }
        }
        return response()->json($array);
    }
}
