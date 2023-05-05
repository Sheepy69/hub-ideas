<?php

namespace HubIdeas\Back\Model\Database;

use mysqli;

use Exception;
use HubIdeas\Back\Model\Config\Config;

class Db
{
    protected const REQUIRED_CONFIG = [
        'host',
        'username',
        'password',
    ];

    protected Config $config;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->config = new Config();
        $this->init();
    }

    /**
     * @throws Exception
     */
    protected function init(): void
    {
        $this->config->checkRequiredConfigs(self::REQUIRED_CONFIG);
        $config = $this->config->getConfig();

        try {
            $conn = new mysqli($config['host'], $config['username'], $config['password']);
        } catch (\Exception) {
            die('Database connection failed');
        }

        if ($conn->connect_error) {
            die('Database connection failed');
        }

        $conn->query('CREATE DATABASE IF NOT EXISTS hubideas');

        try {
            $conn = new mysqli($config['host'], $config['username'], $config['password'], 'hubideas');
        } catch (\Exception) {
            die('Database connection failed');
        }

        $queries = $this->getQueries();
        array_walk($queries, fn($query) => $conn->query($query));
    }

    protected function getQueries(): array
    {
        return [
            // create admin && admin_token tables
            'CREATE TABLE IF NOT EXISTS admin (id INT PRIMARY KEY NOT NULL, username VARCHAR(256), password VARCHAR(256), active BOOL, online BOOL, created_at DATETIME, updated_at DATETIME, role varchar(256))',
            'CREATE TABLE IF NOT EXISTS admin_token (id INT PRIMARY KEY NOT NULL, token VARCHAR(256), created_at DATETIME, updated_at DATETIME, expiration_date DATETIME, valid BOOL, IP varchar(256))',

            // create user && user_token tables
            'CREATE TABLE IF NOT EXISTS user (id INT PRIMARY KEY NOT NULL, username VARCHAR(256), password VARCHAR(256), active BOOL, online BOOL, created_at DATETIME, updated_at DATETIME, role varchar(256))',
            'CREATE TABLE IF NOT EXISTS user_token (id INT PRIMARY KEY NOT NULL, token VARCHAR(256), created_at DATETIME, updated_at DATETIME, expiration_date DATETIME, valid BOOL, IP varchar(256))'
        ];
    }
}