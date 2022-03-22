<?php

namespace Article;
/*
 * создать классы Статья, Издатель, сервис цензуры
 * 
 * у статьи 4 свойства имя, содержание, аудитория, содержание фото
 * сервис цензуры имеет метод цензура(придумать функционал цензуры метода)
 * У издателя свойство объект сервсиса цензуры, конструткор, метод отправки, и метод публикации
 * метод отправки приватный метод для вывода какая статья в каком канале связи и какой содердательности была опубликована
 * метод публикации проверяет аудиторию статьи и производит цензуру, елси статья содержит отограцию то так же выкладывается в инстаграм
 * создать 3 статьи под каждое условие и опубликовать из у издателя 
 */
class Article
{
    public $name;
    public $content;
    public $ageCategory;
    public $isContainsPicture;

    public function __construct($name, $content, $ageCategory = null, $isContainsPicture = false)
    {
        $this->name = $name;
        $this->content = $content;
        $this->ageCategory = $ageCategory;
        $this->isContainsPicture = $isContainsPicture;
    }
}

class CensorService
{
    public function censor(string $text) : string
    {
        $text = str_replace("блин", "****", $text);
        return $text;
    }
}

class Publisher
{
    public CensorService $censor;

    public function __construct(CensorService $censor)
    {
        $this->censor = $censor;
    }

    private function send($name, $content, $chanelPublic)
    {
        echo "Статья: {$name} была опубликована в {$chanelPublic}.<br> {$content}<br><br>";
    }

    public function publish(Article $article)
    {
        $content = $article->content;
        if ($article->ageCategory < 18 || $article->ageCategory) {
            $content = $this->censor->censor($article->content);
        }

        $this->send($article->name, $content, "интернет блог");

        if ($article->isContainsPicture) {
            $this->send($article->name, $content, "instagram");
        }
    }
}

$publisher = new Publisher(new CensorService());

$article1 = new Article("Обсуждение нынешней политики", "Члены делегаций РФ и Украины перед началом переговоров.... блин как это", 12);
$article2 = new Article("САМЫЕ НЕДООЦЕНЕННЫЕ СМАРТФОНЫ 2022 ГОДА", "Все внимание гиков сконцентрировано на нескольких десятках смартфонов, и иногда мы не замечаем стоящие аппараты, о которых не говорят из каждого утюга. А ведь зачастую именно такие незаметные устройства достойны того, чтобы оказаться в руках настоящего ценителя.
Сегодня я расскажу вам о недооцененных смартфонах, которые могли бы претендовать на звание лучшего выбора, но их преимущества затмили более популярные устройства.", 21);
$article3 = new Article("Мысли в слух", "Я не историк, но буду рассказывать об этих событиях своим детям со всеми деталями.... ", null, true);

$publisher->publish($article1);
$publisher->publish($article2);
$publisher->publish($article3);
