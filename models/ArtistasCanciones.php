<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artistas_canciones".
 *
 * @property int $artista_id
 * @property int $cancion_id
 *
 * @property Artistas $artista
 * @property Canciones $cancion
 */
class ArtistasCanciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artistas_canciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['artista_id', 'cancion_id'], 'required'],
            [['artista_id', 'cancion_id'], 'default', 'value' => null],
            [['artista_id', 'cancion_id'], 'integer'],
            [['artista_id', 'cancion_id'], 'unique', 'targetAttribute' => ['artista_id', 'cancion_id']],
            [['artista_id'], 'exist', 'skipOnError' => true, 'targetClass' => Artistas::className(), 'targetAttribute' => ['artista_id' => 'id']],
            [['cancion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Canciones::className(), 'targetAttribute' => ['cancion_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'artista_id' => 'Artista ID',
            'cancion_id' => 'Cancion ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtista()
    {
        return $this->hasOne(Artistas::className(), ['id' => 'artista_id'])->inverseOf('artistasCanciones');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCancion()
    {
        return $this->hasOne(Canciones::className(), ['id' => 'cancion_id'])->inverseOf('artistasCanciones');
    }
}
