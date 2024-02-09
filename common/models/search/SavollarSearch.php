<?php

namespace common\models\search;

use  yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Savollar;

/**
 * SavollarSearch represents the model behind the search form of `common\models\Savollar`.
 */
class SavollarSearch extends Savollar
{
    /**
     * @var mixed|null
     */
//    private mixed $fan_id;
    /**
     * @var mixed|null
     */
    public  $test_id;
    public  $question;
    public  $option;



    /**
     * {@inheritdoc}
     */ 
    public function rules(): array
    {
        return [
            [['id', 'success_answer','option', 'fan_id','test_id'], 'integer'],
            [['question', 'option',  'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios(): array
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
    {
        $query = Savollar::find()->with(
            [
                'test' => function ($query) {
                    $query->select(['id', 'name']);
                },
            ]
        );

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
//             uncomment the following line if you do not want to return any records when validation fails
//             $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'success_answer' => $this->success_answer,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'fan_id' => $this->fan_id,
            'test_id'=>$this->test_id,



        ]);

        $query->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'option', $this->option]);

        return $dataProvider;
    }
}
