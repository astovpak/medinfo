<?php

namespace frontend\models\catalog;

use common\models\Catalog;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Search represents the model behind the search form about `common\models\faq\Faq`.
 */
class Search extends Catalog
{
   public $torg_name;
   public $mnn;
   
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['mnn', 'torg_name'], 'string', 'max' => 255],
             ['id','integer']
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
        $query = Catalog::find();
        
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        //$query ->andWhere("MATCH(torg_name) AGAINST ('$this->torg_name' IN BOOLEAN MODE)"); 
        $query->andFilterWhere([
            'id' => $this->id,
            //'torg_name' => $this->product_id,
           // 'user_id' => $this->user_id,
            
        ]);
        

        return $dataProvider;
    }
}


