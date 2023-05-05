<?php

namespace HubIdeas\Back\Model\Config;

use Exception;

class Config
{
    protected array $errors = [];
    /**
     * @throws Exception
     */
    public function getConfig(): array
    {
        $path = 'config.json';

        if (file_exists($path) === false) {
            die('Missing "back/src/config.json" file');
        }

        return json_decode(
            file_get_contents($path, true),
            true
        );
    }

    /**
     * @throws Exception
     */
    public function checkRequiredConfigs(array $configs): void
    {
        if ($configs == []) {
            return;
        }

        $configurations = $this->getConfig();

        foreach ($configs as $config) {
            if (isset($configurations[$config])) {
                continue;
            }

            die(sprintf('Missing required config %s', $config));
        }
    }
}