<?php

namespace Pingpong\Themes;

class Theme {

    /**
     * Theme name.
     *
     * @var string
     */
    protected $name;

    /**
     * Theme description.
     *
     * @var string
     */
    protected $description;

    /**
     * Author information.
     *
     * @var array
     */
    protected $author = [];

    /**
     * Theme status. Enabled (true) or Disabled (false).
     *
     * @var boolean
     */
    protected $enabled = true;

    /**
     * The theme path.
     *
     * @var string
     */
    protected $path;

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get author info.
     *
     * @return array
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Determine whether this theme is disabled.
     *
     * @return bool
     */
    public function disabled()
    {
        return ! $this->enabled();
    }

    /**
     * Determine whether this theme is enabled.
     *
     * @return bool
     */
    public function enabled()
    {
        return $this->enabled == true;
    }

    /**
     * Determine whether the current theme is equal with this theme.
     *
     * @return bool
     */
    public function isActive()
    {
        return ThemeFacade::getCurrent() == $this->name;
    }

    /**
     * Get author info.
     *
     * @param string $type
     * @param  null $default
     * @return string|null
     */
    public function getAuthorInfo($type, $default = null)
    {
        return array_get($this->author, $type, $default);
    }

    /**
     * Get author name.
     *
     * @param null $default
     * @return string|null
     */
    public function getAuthorName($default = null)
    {
        return $this->getAuthorInfo('name', $default);
    }

    /**
     * Get author email.
     *
     * @param null $default
     * @return string|null
     */
    public function getAuthorEmail($default = null)
    {
        return $this->getAuthorInfo('email', $default);
    }

    /**
     * Get info from this theme.
     *
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if (property_exists($this, $key))
        {
            return $this->{$key};
        }

        return $default;
    }

    /**
     * Handle call to __get method.
     *
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->get($key);
    }

    /**
     * Handle call to __set method.
     *
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        if (property_exists($this, $key))
        {
            $this->{$key} = $value;
        }
    }

}