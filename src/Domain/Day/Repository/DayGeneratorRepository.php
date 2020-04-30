<?php

namespace App\Domain\Day\Repository;

use App\Domain\Day\Data\DayCreatorData;
use App\Repository\QueryFactory;
use App\Repository\RepositoryInterface;
use App\Repository\TableName;

/**
 * Repository.
 */
class DayGeneratorRepository implements RepositoryInterface
{
    /**
     * @var QueryFactory The query factory
     */
    private $queryFactory;

    /**
     * Constructor.
     *
     * @param QueryFactory $queryFactory The query factory
     */
    public function __construct(QueryFactory $queryFactory)
    {
        $this->queryFactory = $queryFactory;
    }

    /**
     * Insert user row.
     *
     * @param ConsCreatorData $user The user
     *
     * @return int The new ID
     */
    public function insertDay(DayCreatorData $day): int
    {
        $d;

        if($day->id_day1==1){
            $d = date("2020-12-7");
        }else if($day->id_day1==2){
            $d = date("2020-12-8");
        }else if($day->id_day1==3){
            $d = date("2020-12-9");
        }else if($day->id_day1==4){
            $d = date("2020-12-10");
        }else{
            $d = date("2020-12-11");
        }
        

        $this->queryFactory->newDelete('consultation')->execute();
        $values = [
            'id_consultation' => '222',
            'start_date' => $d,
            'start_hour' => $day->start_cons,
            'subject'=>'PAM',
            'end_hour' => $day->end_cons,
            'name'=>'cos',
            'surname'=>'cos',
            'email'=>'a@a.pl',
            'accept'=>1,
            'id_user_FK'=>1,
            'id_day_FK'=>$day->id_day1,
        ];
        
        
        $this->queryFactory->newDelete('day')->execute();
        $row = [
            'id_day' =>$day->id_day1,
            'day_name' =>$day->day_name1,
            'start_cons' => $day->start_cons,
            'end_cons' => $day->end_cons,
            'id_owner2_FK' => $day->id_owner2_FK,
        ];

        $this->queryFactory->newInsert(TableName::DAY, $row)->execute()->lastInsertId();
        
        return (int)$this->queryFactory->newInsert('consultation', $values)->execute()->lastInsertId();
    }
    public function insertDay2(DayCreatorData $day): int
    {
        $row = [
            'id_day' =>$day->id_day2,
            'day_name' =>$day->day_name2,
            'start_cons' => $day->start_cons,
            'end_cons' => $day->end_cons,
            'id_owner2_FK' => $day->id_owner2_FK,
        ];
        if($day->day_name2!='--brak--'){
            $d1;

        if($day->id_day2==1){
            $d1 = date("2020-12-7");
        }else if($day->id_day2==2){
            $d1 = date("2020-12-8");
        }else if($day->id_day2==3){
            $d1 = date("2020-12-9");
        }else if($day->id_day2==4){
            $d1 = date("2020-12-10");
        }else{
            $d1 = date("2020-12-11");
        }
        $values2 = [
            'id_consultation' => '223',
            'start_date' => $d1,
            'start_hour' => $day->start_cons,
            'subject'=>'PAM',
            'end_hour' => $day->end_cons,
            'name'=>'cos',
            'surname'=>'cos',
            'email'=>'a@a.pl',
            'accept'=>1,
            'id_user_FK'=>1,
            'id_day_FK'=>$day->id_day2,
        ];
        
    }
        if($day->day_name2!='--brak--'){
            $this->queryFactory->newInsert(TableName::DAY, $row)->execute();
            return (int)$this->queryFactory->newInsert('consultation', $values2)->execute()->lastInsertId();
        }
        else{
            return 0;
        }
    }
}
