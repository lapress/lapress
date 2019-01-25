<?php

namespace App\Models;

use LaPress\Models\Post as BasePost;

use Laravel\Scout\Searchable;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class Post extends BasePost
{
    use Searchable;

    public $asYouType = true;

    /**
     * @return array
     */
    public function toSearchableArray()
    {
        if ($this->isDraft()) {
            return [];
        }

        return [
            'ID'         => $this->ID,
            'post_title' => $this->post_title,
            'body'       => $this->post_content,
            'categories' => $this->categories->pluck('name')->implode(', '),
            'post_date'  => $this->date,
        ];
    }

    /**
     * @return string
     */
    public function searchableAs()
    {
        return 'posts';
    }
}
