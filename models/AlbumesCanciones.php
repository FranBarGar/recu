<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "albumes_canciones".
 *
 * @property int $album_id
 * @property int $cancion_id
 *
 * @property Albumes $album
 * @property Canciones $cancion
 */
class AlbumesCanciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'albumes_canciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['album_id', 'cancion_id'], 'required'],
            [['album_id', 'cancion_id'], 'default', 'value' => null],
            [['album_id', 'cancion_id'], 'integer'],
            [['album_id', 'cancion_id'], 'unique', 'targetAttribute' => ['album_id', 'cancion_id']],
            [['album_id'], 'exist', 'skipOnError' => true, 'targetClass' => Albumes::className(), 'targetAttribute' => ['album_id' => 'id']],
            [['cancion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Canciones::className(), 'targetAttribute' => ['cancion_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'album_id' => 'Album ID',
            'cancion_id' => 'Cancion ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum()
    {
        return $this->hasOne(Albumes::className(), ['id' => 'album_id'])->inverseOf('albumesCanciones');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCancion()
    {
        return $this->hasOne(Canciones::className(), ['id' => 'cancion_id'])->inverseOf('albumesCanciones');
    }
}
