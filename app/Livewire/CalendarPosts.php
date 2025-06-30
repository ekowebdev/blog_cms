<?php 

namespace App\Livewire;

use App\Models\Post;
use Carbon\Carbon;
use Livewire\Component;

class CalendarPosts extends Component
{
    public $selectedDate;
    public $calendar = [];
    public $posts = [];

    public $currentMonth;
    public $currentYear;

    public function mount()
    {
        $now = now();
        $this->currentMonth = $now->month;
        $this->currentYear = $now->year;
        $this->selectedDate = $now->toDateString();

        $this->generateCalendar();
        $this->loadPosts();
    }

    public function selectDate($date)
    {
        $this->selectedDate = $date;
        $this->loadPosts();
    }

    public function previousMonth()
    {
        $date = Carbon::createFromDate($this->currentYear, $this->currentMonth)->subMonth();
        $this->currentMonth = $date->month;
        $this->currentYear = $date->year;

        $this->generateCalendar();
    }

    public function nextMonth()
    {
        $date = Carbon::createFromDate($this->currentYear, $this->currentMonth)->addMonth();
        $this->currentMonth = $date->month;
        $this->currentYear = $date->year;

        $this->generateCalendar();
    }

    public function generateCalendar()
    {
        $startOfMonth = Carbon::createFromDate($this->currentYear, $this->currentMonth, 1);
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        $calendar = [];

        $firstDayOfWeek = $startOfMonth->dayOfWeekIso;
        $daysInMonth = $startOfMonth->daysInMonth;

        for ($i = 1; $i < $firstDayOfWeek; $i++) {
            $calendar[] = null;
        }

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = Carbon::createFromDate($this->currentYear, $this->currentMonth, $day);
            $hasPost = Post::where('status', 'published')->whereDate('published_at', $date)->exists();

            $calendar[] = [
                'day' => $day,
                'date' => $date->toDateString(),
                'has_post' => $hasPost,
            ];
        }

        $this->calendar = $calendar;
        $this->loadPosts();
    }

    public function loadPosts()
    {
        $this->posts = Post::where('status', 'published')
            ->whereDate('published_at', $this->selectedDate)
            ->get();
    }

    public function render()
    {
        return view('livewire.calendar-posts');
    }
}

