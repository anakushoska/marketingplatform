<?php


namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $notifications = Notification::all();


            return view('dashboard.notifications.index')->with('notifications',$notifications);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        return view('dashboard.notifications.add_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {



            $request->validate([
                "subject" => "required|string|max:100",
                "body"=> "required|string",
            ]);

            $input = $request->only(["subject", "body"]);
            $input["number_of_emails"]=count(array_unique($request->get("emails")));
            $input["status"]=false;

            $notification = new Notification($input);
            $notification->save();

                if ($request->hasFile('photo')) {

                    if ($request->file('photo')->isValid()) {

                        $request->validate([
                            'photo' => 'mimes:jpeg,png',
                        ]);
                        $extension = $request->photo->extension();

                        $request->photo->storeAs('/public', $notification->subject.".".$extension);
                        $url = Storage::url($notification->subject.".".$extension);
                        $notification->photo=$url;
                        $notification->save();

                    }
                }

            }

            foreach(array_unique($request->get('emails')) as $email){

                DB::table('ricipient_notifications')-> insert([
                    'email' => $email,
                    'status' => false,
                    'notification_id' => $notification->id
                ]);
            }




            return redirect()->route("notifications.index")->with("success", "New notification created");
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
        $notification=Notification::find($id);

    return view ('dashboard.notifications.add_edit')
                ->with("notification", $notification);
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
        $notification=Notification::find($id);
        $request->validate([
            "subject" => "required|string|max:100",
            "body"=> "required|string",
        ]);


        $input = $request->only(["subject", "body"]);
        $input["number_of_emails"]=count(array_unique($request->get("emails")));
        $input["photo"] = $request->get('photo');
        $input["status"]=false;

        $notification->update($input);

    return redirect()->route('notifications.index');
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
