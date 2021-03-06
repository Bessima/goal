<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TaskSearch represents the model behind the search form about `app\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'goal_id', 'closed', 'percent'], 'integer'],
            [['title', 'date', 'created_at', 'closed_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
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
    public function search($params)
    {
        $query = Task::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'goal_id' => $this->goal_id,
            'closed' => $this->closed,
        ]);

        $query
            ->andFilterWhere(['like', 'title', $this->title])
        ;

        return $dataProvider;
    }

    /**
     * Return true if one of filter fields is used
     * @return bool
     */
    public function isUsed() {
        return $this->title or $this->closed!=='0';
    }

}