<?php

namespace app\modules\feedback\models;

use app\modules\feedback\components\ModerationBehavior;
use app\modules\feedback\models\Feedback;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class FeedbackSearch extends Feedback
{
    public function rules()
    {
        // only fields in rules() are searchable
        return [
            [['name', 'phone', 'email'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * @param $params
     * @param false $ifstatus
     * @return ActiveDataProvider
     */
    public function search($params, $ifstatus = false)
    {
        $query = $ifstatus ? Feedback::find()->where(['status' => ModerationBehavior::APPROVED]) : Feedback::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // adjust the query by adding the filters
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}