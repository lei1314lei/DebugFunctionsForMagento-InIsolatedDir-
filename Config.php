<?php
namespace Martindebug;
class Config
{
    CONST DEBUG_TURN_ON=true;
    CONST LOG_FILE_EVENTS_NAME='events_name_2.log';
    CONST CRON_SCHEDULE_START_TIME="2019-10-28";

    CONST CRON_FILTER_JOB_CODE="toolots_weekly_tasks,toolots_monthly_tasks";  //just only generate schedule for those job
    CONST CRON_SCHEDULE_AHEAD_FOR_DAYS=30;


    static function cornScheduleAheadFor($scheduleAheadFor)
    {
         $days=(int)self::CRON_SCHEDULE_AHEAD_FOR_DAYS;
         return $days*24*60*60;
    }

    static function cronJobScheduleStartTime($now)
    {
        $now=strtotime(self::CRON_SCHEDULE_START_TIME);
        $now=\Mage::getSingleton('core/date')->gmtTimestamp($now);
        return $now;
    }
    /*
     *
     *filter jobs to generate schedule by the value of self::CRON_FILTER_JOB_CODE
     *
     * */
    static function cronFilterJob($jobs)
    {
        $return =array();
        $jobsExpected=self::CRON_FILTER_JOB_CODE;
        if(empty($jobsExpected))
        {
            return $jobs;
        }else{
            $jobsExpected=explode(',',$jobsExpected);
            foreach ($jobs as $jobCode => $jobConfig) {
                if(in_array($jobCode,$jobsExpected))
                {
                    $return[$jobCode]=$jobConfig;
                }
            }
        }
        return $return;
    }
}