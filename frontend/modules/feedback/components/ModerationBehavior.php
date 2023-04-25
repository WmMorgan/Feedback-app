<?php
namespace app\modules\feedback\components;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class ModerationBehavior extends Behavior
{
    const PROCCESS = 0;
    const APPROVED = 1;
    const IGNORE = 2;

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
        ];
    }

    public function afterFind($event)
    {
        if($event->sender->status == self::PROCCESS)
            $event->sender->status = "На рассмотрении";

        if($event->sender->status == self::APPROVED)
            $event->sender->status = "Подтвержденный";

        if($event->sender->status == self::IGNORE)
            $event->sender->status = "Отменено";

    }
}