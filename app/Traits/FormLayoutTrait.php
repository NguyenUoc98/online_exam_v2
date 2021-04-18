<?php

namespace App\Traits;

trait FormLayoutTrait
{

    protected $elements = [];

    public function field($name, $grid, $options = '')
    {
        $type = ':voyager';
        if (!is_array($options))
        {
            $options = ['class' => $options];
        }
        $element          = compact('type', 'name', 'grid', 'options');
        $this->elements[] = $element;
        return $this;
    }

    public function hiddenField($name)
    {
        $type             = 'hidden';
        $isEnd            = 'false';
        $element          = compact('type', 'name', 'isEnd');
        $this->elements[] = $element;
        return $this;
    }

    public function hasManyField($name, $slug, $title)
    {
        $type             = 'hasMany';
        $isEnd            = false;
        $element          = compact('type', 'name', 'slug', 'title', 'isEnd');
        $this->elements[] = $element;
        return $this;
    }

    public function subViewField($name, $params = [])
    {
        $type             = 'subView';
        $this->elements[] = compact('type', 'name', 'params');
        return $this;
    }

    public function htmlField($content)
    {
        $type             = 'html';
        $this->elements[] = compact('type', 'content');
        return $this;
    }

    public function get()
    {
        return $this->elements;
    }

    public function formFields()
    {
        return $this->elements;
    }

    public function displayFields()
    {
        return $this->formFields();
    }

    function __call($func, $params)
    {

        if (strpos($func, 'begin') === 0)
        {
            $options = array_shift($params);
            if (!is_array($options))
            {
                $options = ['class' => $options];
            }
            $text    = array_shift($params);
            $type    = substr($func, 5);
            $element = ['type'    => $type,
                'options' => $options,
                'text'    => $text,
                'isEnd'   => false];

            $this->elements[] = $element;

            return $this; //chain
        }
        else if (strpos($func, 'end') === 0)
        {
            $isEnd            = true;
            $type             = substr($func, 3);
            $element          = ['type' => $type, 'isEnd' => true];
            $this->elements[] = $element;
            return $this; //chain
        }
        return parent::__call($func, $params);
    }

}
