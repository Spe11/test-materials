Имеется сайт, написанный на Yii2. Используется шаблон приложения advanced (https://github.com/yiisoft/yii2-app-advanced). Регистрация и авторизация отсутствует.
На сайте есть раздел с материалами, разделенными по типу (видео, фото и т.д.).
В коде раздел с материалами сделан отдельным модулем и структура этого модуля выглядит следующим образом:
	materials
		-controllers
			DefaultController.php
		-models
			Material.php
		-views
			list.php
			view.php
		Module.php

В контроллере каждый тип материала представлен отдельным экшеном (actionVideo, actionAudio и т.д.).

Таблица в БД с материалами имеет примерно такой вид:
	-id
	-type (тип материала)
	-прочие поля...

На странице каждого материала выводятся 3 рекомендуемых материала того же типа.

В контроллере имеется метод для получения 3 рекомендуемых материалов, выглядящий так:
protected function findRecommendMaterials($id, $type)
{
	return Material::find()
		->where(['not in', 'id', [$id]])
		->andWhere(['type' => $type])
		->orderBy(new Expression('rand()'))
		->limit(3)
		->all();
}

Необходимо дописать код таким образом, чтобы в рекомендуемых материалах выводились только те материалы, которые еще не были просмотрены. Код может быть достаточно абстрактным, главное, чтобы он отражал суть вашего решения.