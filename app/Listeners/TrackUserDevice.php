<?php

namespace App\Listeners;

use App\Models\DeviceSession;
use Illuminate\Auth\Events\Login;
use Jenssegers\Agent\Agent;

class TrackUserDevice
{
    public function handle(Login $event): void
    {
        $agent = new Agent();

        // Update current device flag for all user's devices
        DeviceSession::where('user_id', $event->user->id)
            ->update(['is_current_device' => false]);

        // Create or update device session for current device
        DeviceSession::updateOrCreate(
            [
                'user_id' => $event->user->id,
                'device_name' => $agent->device() . ' ' . $agent->browser(),
                'ip_address' => request()->ip(),
            ],
            [
                'device_type' => $this->getDeviceType($agent),
                'location' => $this->getLocation(request()->ip()),
                'last_activity' => now(),
                'is_current_device' => true
            ]
        );
    }

    private function getDeviceType(Agent $agent): string
    {
        if ($agent->isPhone()) {
            return 'mobile';
        } elseif ($agent->isTablet()) {
            return 'tablet';
        }
        return 'desktop';
    }

    private function getLocation($ip): string
    {
        // In production, integrate with a geolocation service
        return 'Location unavailable';
    }
}