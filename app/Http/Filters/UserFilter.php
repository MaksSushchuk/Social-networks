<?php
namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter{

    public const AGE = 'age';
    public const SEX = 'sex';
    public const COUNTRY = 'country';
    public const BIRTHPLACE = 'birthplace';
    public const LOCATION = 'location';
    public const TEXT = 'text';

    protected function getCallbacks(): array
    {
        return [
            self::AGE =>[$this, 'age'],
            self::SEX =>[$this, 'sex'],
            self::COUNTRY =>[$this, 'country'],
            self::BIRTHPLACE =>[$this, 'birthplace'],
            self::LOCATION =>[$this, 'location'],
            self::TEXT =>[$this, 'text'],


        ];
    }

    public function age(Builder $builder, $value){

        $builder->where('age','like',"%{$value}%");
    }
    
    public function sex(Builder $builder, $value){

        $builder->where('sex','like',"%{$value}%");
    }

    public function country(Builder $builder, $value){

        $builder->where('country','like',"%{$value}%");
    }

    public function birthplace(Builder $builder, $value){

        $builder->where('birthplace','like',"%{$value}%");
    }

    public function location(Builder $builder, $value){

        $builder->where('location','like',"%{$value}%");
    }

    public function text(Builder $builder, $value){

        $builder->where('username','like',"%{$value}%");
    }
}