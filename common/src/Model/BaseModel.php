<?php

namespace Common\Model {

    use yii\db\ActiveRecord;

    /**
     *
     */
    abstract class BaseModel extends ActiveRecord
    {
        /**
         * @return int|null
         */
        public function getId(): ?int
        {
            return $this->id;
        }
    }
}
