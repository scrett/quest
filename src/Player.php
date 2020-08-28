<?php
// Клас обработчик действий игрока

class Player
{
    protected $history; //история ходов игрока (шаг назад удалает последний ход)
    protected $allHistory; //полная история ходов (шаг назад добавляет ход назад)
    protected $startId; //номер первого квеста

    public function getQuest() //получить место нахождение игрока
    {
        return end($this->history);
    }

    public function addQuest($quest) //добавить новый шаг
    {
        if(end($this->history) != $quest) {
            array_push($this->history, $quest);
            array_push($this->allHistory, $quest);
        }
    }

    public function backQuest() //сделать шаг назад
    {
        if(count($this->history)>$this->startId) {
            array_pop($this->history);
            array_push($this->allHistory, end($this->history));
        }
    }

    public function startQuest($startId) //начать квест с начала
    {
        $this->history=[$startId];
        $this->allHistory=[$startId];
    }

    public function getHistory() //получить историю ходов
    {
        return $this->history;
    }

    public function getAllHistory() //получить полную историю ходов
    {
        return $this->allHistory;
    }

}