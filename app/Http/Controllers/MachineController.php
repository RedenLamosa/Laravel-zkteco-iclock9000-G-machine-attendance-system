<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rats\Zkteco\Lib\ZKTeco;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function device_ip()
    {
        $deviceip = '192.168.1.104';
        return $deviceip;
    }
    public function index()
    {
        $deviceip = $this->device_ip();

        // $zk = new ZKTeco($deviceip,4370);
        // $zk->connect(); 
        // $zk->disableDevice();  
        // $users = $zk->getUser();
        // $attendace = $zk->getAttendance();
        // $zk->testVoice(); 
        return view('welcome',compact('deviceip'));
        //dd($attendace);
    }
    public function test_sound()
    {
        $deviceip = $this->device_ip();

        $zk = new ZKTeco($deviceip,4370);
        $zk->connect(); 
        $zk->disableDevice();  
        $zk->testVoice(); 

        return redirect()->back();
    }

    public function device_information()
    {
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip,4370);
        $zk->connect(); 
        $zk->disableDevice();  
        $deviceVersion = $zk->version();
        $deviceOSVersion = $zk->osVersion();
        $devicePlatform = $zk->platform();
        $devicefmVersion = $zk->fmVersion();
        $deviceworkCode = $zk->workCode();
        $devicessr = $zk->ssr();
        $devicepinWidth = $zk->pinWidth();
        $deviceserialNumber = $zk->serialNumber();
        $devicedeviceName = $zk->deviceName();
        $devicegetTime = $zk->getTime();
        return view('device-information',compact(
            'deviceip','deviceVersion','deviceOSVersion','devicePlatform','devicefmVersion','deviceworkCode',
            'devicessr','devicepinWidth','deviceserialNumber','devicedeviceName','devicegetTime',
        ));
    }

    public function device_data()
    {
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip,4370);
        $zk->connect(); 
        $zk->disableDevice();  
        $users = $zk->getUser();
        $attendaces = $zk->getAttendance();
        return view('device-data',compact(
            'deviceip','users','attendaces',
        ));
    }
    public function device_data_clear_attendance()
    {
        $deviceip = $this->device_ip();

        $zk = new ZKTeco($deviceip,4370);
        $zk->connect(); 
        $zk->disableDevice();  
        $zk->clearAttendance();

        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
