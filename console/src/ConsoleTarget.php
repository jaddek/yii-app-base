<?php

namespace Console {

    use yii\helpers\Console;
    use yii\log\Logger;
    use yii\log\Target;

    /**
     *
     */
    class ConsoleTarget extends Target
    {
        /**
         * @var
         */
        public $exportInterval = 1;

        public $logVars = [];

        /**
         * Returns the text display of the specified level for the Sentry.
         *
         * @param integer $level The message level, e.g. [[LEVEL_ERROR]], [[LEVEL_WARNING]].
         *
         * @return string
         */
        public static function getLevelName($level)
        {
            static $levels = [
                Logger::LEVEL_ERROR         => 'error',
                Logger::LEVEL_WARNING       => 'warning',
                Logger::LEVEL_INFO          => 'info',
                Logger::LEVEL_TRACE         => 'debug',
                Logger::LEVEL_PROFILE_BEGIN => 'debug',
                Logger::LEVEL_PROFILE_END   => 'debug',
            ];

            return isset($levels[$level]) ? $levels[$level] : 'error';
        }

        /**
         * @inheritdoc
         */
        public function export()
        {
            foreach ($this->messages as $message) {
                list($text) = $message;

                if ($text instanceof \Throwable) {
                    $this->error($message);
                } else {
                    $this->output($message);
                }
            }

            return;
        }

        /**
         * @param array $message
         */
        private function error(array $message)
        {
            list($text, $level, $category, $timestamp) = $message;

            Console::error(sprintf('[%s][%s][%s][%s]', static::getLevelName($level), $timestamp, $category, $text->getMessage()));
        }

        /**
         * @param array $message
         */
        private function output(array $message)
        {
            list($text, $level, $category, $timestamp) = $message;

            Console::output(sprintf('[%s][%s][%s][%s]', static::getLevelName($level), $timestamp, $category, is_array($text) ? $text['msg'] : $text));
        }
    }
}
