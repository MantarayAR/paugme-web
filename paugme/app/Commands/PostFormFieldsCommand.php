<?php

namespace App\Commands;

use App\Commands\Command;
use App\Tag;
use App\Post;
use Illuminate\Contracts\Bus\SelfHandling;
use Carbon\Carbon;

class PostFormFieldsCommand extends Command implements SelfHandling
{
    /**
     * The id of the post row
     *
     * @var integer
     */
    protected $id;
    protected $fieldList;

    /**
     * Create a new command instance.
     *
     * @param $id interger optional
     */
    public function __construct($id = null)
    {
        $this->fieldList = Post::fields();
        $this->id = $id;
    }

    /**
     * Execute the command.
     *
     * @return array
     */
    public function handle()
    {
        if ($this->id) {
            $fields = $this->fieldsFromModel($this->id, $this->fieldList);
        } else {
            $fields = $this->fieldList;
            $when = Carbon::now()->addHour();
            $fields['publish_date'] = $when->format('M-j-Y');
            $fields['publish_time'] = $when->format('g:i A');
        }

        foreach ($fields as $fieldName => $fieldValue) {
            $fields[$fieldName] = old($fieldName, $fieldValue);
        }

        $allTags = Tag::lists('tag')->all();

        return array_merge(
            $fields,
            ['allTags' => $allTags]
        );
    }

    protected function fieldsFromModel($id, array $fields) {
        $post = Post::findOrFail($id);
        $fieldNames = array_keys(array_except($fields, ['tags']));

        $fields = ['id' => $id];

        foreach($fieldNames as $field) {
            $fields[$field] = $post->{$field};
        }

        $fields['tags'] = $post->tags()->lists('tag')->all();

        return $fields;
    }
}
