<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Helpers\TeHelper;

class WillExpireAtFunctionTesting extends TestCase
{
    /**
     * Test if time returns correct if difference is <= 90.
     *
     * @return void
     */
    public function differenceLessThanOrEqualNinety()
    {
        $due_time = new Carbon('2018-09-14 13:00:00');
        $created_at = new Carbon('2018-09-12 13:00:00');

        $time = TeHelper::willExpireAt($due_time, $created_at);
        $expected_time = '2018-09-14 13:00:00';
        $this->assertTrue($time == $expected_time);
    }

    /**
     * Test if time returns correct if difference is <= 24.
     *
     * @return void
     */
    public function differenceLessThanOrEqualTwentyFour()
    {
        $due_time = new Carbon('2018-09-13 13:00:00');
        $created_at = new Carbon('2018-09-12 13:00:00');

        $time = TeHelper::willExpireAt($due_time, $created_at);
        $expected_time = '2018-09-13 13:00:00';
        $this->assertTrue($time == $expected_time);
    }
}