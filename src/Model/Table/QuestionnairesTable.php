<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questionnaires Model
 *
 * @property \App\Model\Table\SurveysTable&\Cake\ORM\Association\BelongsToMany $Surveys
 *
 * @method \App\Model\Entity\Questionnaire get($primaryKey, $options = [])
 * @method \App\Model\Entity\Questionnaire newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Questionnaire[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Questionnaire|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Questionnaire saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Questionnaire patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Questionnaire[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Questionnaire findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuestionnairesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('questionnaires');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Surveys', [
            'foreignKey' => 'questionnaire_id',
            'targetForeignKey' => 'survey_id',
            'joinTable' => 'questionnaires_surveys',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 60)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->dateTime('published')
            ->allowEmptyDateTime('published');

        return $validator;
    }
    
    public function findPublished(Query $query, array $options) {
        $query->select(['id','title','created', 'modified', 'published']);
        
        $ids = [];
        foreach ($query as $row) {
            
            if($options['period']=='am') {
                if($row->created->hour < 12) {
                   $ids[] = $row->id;
                }
            } else {
                if($row->created->hour >= 12) {
                   $ids[] = $row->id;
                }
            }
        }
        
        $query->where(['id IN' => $ids])
                ->order(['created'=>'ASC']);
        
        return $query;
    }
}
