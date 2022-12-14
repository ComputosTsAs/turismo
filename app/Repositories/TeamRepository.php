<?php

namespace App\Repositories;

use App\Models\Team;
use App\Repositories\BaseRepository;

/**
 * Class TeamRepository
 * @package App\Repositories
 * @version October 18, 2019, 11:11 am -03
 */

class TeamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'job',
        'important_image',
        'publish'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Team::class;
    }
}
