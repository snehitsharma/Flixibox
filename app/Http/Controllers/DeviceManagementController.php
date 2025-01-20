<?php

namespace App\Http\Controllers;

use App\Models\DeviceSession;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Inertia\Inertia;

class DeviceManagementController extends Controller
{
    public function index()
    {
        $devices = DeviceSession::where('user_id', auth()->id())
            ->orderBy('last_activity', 'desc')
            ->get();

        return Inertia::render('Profile/DeviceManagement', [
            'devices' => $devices
        ]);
    }

    public function signOutDevice($id)
    {
        $device = DeviceSession::where('user_id', auth()->id())
            ->where('id', $id)
            ->firstOrFail();

        if (!$device->is_current_device) {
            $device->delete();
            return back()->with('success', 'Device signed out successfully');
        }

        return back()->with('error', 'Cannot sign out current device');
    }

    public function signOutAllDevices()
    {
        DeviceSession::where('user_id', auth()->id())
            ->where('is_current_device', false)
            ->delete();

        return back()->with('success', 'All other devices signed out');
    }

    public function trackNewDevice(Request $request)
    {
        $agent = new Agent();
        
        $deviceSession = DeviceSession::firstOrCreate(
            [
                'user_id' => auth()->id(),
                'ip_address' => $request->ip(),
                'device_name' => $agent->device() . ' ' . $agent->browser(),
            ],
            [
                'device_type' => $this->getDeviceType($agent),
                'location' => $this->getLocation($request->ip()),
                'last_activity' => now(),
                'is_current_device' => true
            ]
        );

        $deviceSession->touch();
        
        return back();
    }

    private function getDeviceType(Agent $agent)
    {
        if ($agent->isPhone()) {
            return 'mobile';
        } elseif ($agent->isTablet()) {
            return 'tablet';
        }
        return 'desktop';
    }

    private function getLocation($ip)
    {
        return 'Location unavailable';
    }
}