<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "advert".
 *
 * @property integer $id
 * @property integer $price
 * @property string $address
 * @property integer $fk_agent_detail
 * @property integer $bedroom
 * @property integer $livingroom
 * @property integer $parking
 * @property integer $kitchen
 * @property string $general_image
 * @property string $description
 * @property string $location
 * @property integer $hot
 * @property integer $sold
 * @property string $type
 * @property integer $recomend
 * @property integer $created_at
 * @property integer $updated_at
 */
class Advert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advert';
    }

    public function behaviors()
    {
        return [
          TimestampBehavior::className(),
        ];
    }
    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['step2'] = ['general_image'];

        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'required'],
            [['price', 'fk_agent_detail', 'bedroom', 'livingroom', 'parking', 'kitchen', 'hot', 'sold', 'type', 'recomend'], 'integer'],
            [['description'], 'string'],
            [['address'], 'string', 'max' => 255],
            [['location'], 'string', 'max' => 50],
            //['general_image', 'file', 'extensions' => ['jpg','png','gif']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'address' => 'Address',
            'fk_agent_detail' => 'Fk Agent Detail',
            'user.username' => 'Username',
            'bedroom' => 'Bedroom',
            'livingroom' => 'Livingroom',
            'parking' => 'Parking',
            'kitchen' => 'Kitchen',
            'general_image' => 'Image',
            'description' => 'Description',
            'location' => 'Location',
            'hot' => 'Hot',
            'sold' => 'Sold',
            'type' => 'Type',
            'recomend' => 'Recomend',
            'created_at' => 'Create At',
            'updated_at' => 'Update At',
        ];
    }




    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'fk_agent_detail']);
    }


    public function afterValidate()
    {
        $this->fk_agent_detail =Yii::$app->user->identity->id;
    }

    public function afterSave($insert, $changedAttributes)
    {
        Yii::$app->locator->cache->set('id',$this->id);
    }


    /**
     * @inheritdoc
     * @return AdvertQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdvertQuery(get_called_class());
    }
}
