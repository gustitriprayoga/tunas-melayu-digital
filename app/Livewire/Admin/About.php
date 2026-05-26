<?php

namespace App\Livewire\Admin;

use App\Models\AboutPage;
use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;

class About extends Component
{
    use WithFileUploads;

    // --- About Page Fields ---
    public $hero_title = '';
    public $hero_subtitle = '';
    public $story_content = '';
    public $vision = '';
    public $mission = '';
    public $core_values = [];
    public $founded_year = '';

    // --- Team Management ---
    public $teams = [];
    public $teamName = '';
    public $teamPosition = '';
    public $teamBio = '';
    public $teamLinkedin = '';
    public $teamGithub = '';
    public $teamSortOrder = 0;
    public $teamImage;
    public $editingTeamId = null;

    public function mount()
    {
        $about = AboutPage::settings();
        $this->hero_title = $about->hero_title;
        $this->hero_subtitle = $about->hero_subtitle;
        $this->story_content = $about->story_content ?? '';
        $this->vision = $about->vision;
        $this->mission = $about->mission;
        $this->core_values = $about->core_values ?? [];
        $this->founded_year = $about->founded_year;

        $this->loadTeams();
    }

    public function loadTeams()
    {
        $this->teams = Team::orderBy('sort_order', 'asc')->get()->toArray();
    }

    // --- Core Values ---
    public function addCoreValue()
    {
        $this->core_values[] = ['icon' => 'heroicon-o-light-bulb', 'title' => '', 'desc' => ''];
    }

    public function removeCoreValue($index)
    {
        unset($this->core_values[$index]);
        $this->core_values = array_values($this->core_values);
    }

    // --- About Page Save ---
    public function saveAbout()
    {
        $this->validate([
            'hero_title' => 'required|string',
            'hero_subtitle' => 'required|string',
            'story_content' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'founded_year' => 'required|string',
        ]);

        $about = AboutPage::settings();
        $about->update([
            'hero_title' => $this->hero_title,
            'hero_subtitle' => $this->hero_subtitle,
            'story_content' => $this->story_content,
            'vision' => $this->vision,
            'mission' => $this->mission,
            'core_values' => $this->core_values,
            'founded_year' => $this->founded_year,
        ]);

        $this->dispatch('notify', ['message' => 'About page content updated successfully!', 'type' => 'success']);
    }

    // --- Team Member Actions ---
    public function startEditTeam($id)
    {
        $team = Team::find($id);
        if (!$team) return;
        $this->editingTeamId = $id;
        $this->teamName = $team->name;
        $this->teamPosition = $team->position;
        $this->teamBio = $team->bio;
        $this->teamLinkedin = $team->social_links['linkedin'] ?? '';
        $this->teamGithub = $team->social_links['github'] ?? '';
        $this->teamSortOrder = $team->sort_order;
        $this->teamImage = null;
    }

    public function cancelEditTeam()
    {
        $this->resetTeamForm();
    }

    public function saveTeam()
    {
        $this->validate([
            'teamName' => 'required|string',
            'teamPosition' => 'required|string',
            'teamBio' => 'nullable|string',
            'teamLinkedin' => 'nullable|url',
            'teamGithub' => 'nullable|url',
            'teamImage' => 'nullable|image|max:2048',
        ]);

        $data = [
            'name' => $this->teamName,
            'position' => $this->teamPosition,
            'bio' => $this->teamBio,
            'social_links' => [
                'linkedin' => $this->teamLinkedin ?: '#',
                'github' => $this->teamGithub ?: '#',
            ],
            'sort_order' => $this->teamSortOrder,
            'is_active' => true,
        ];

        if ($this->editingTeamId) {
            $team = Team::find($this->editingTeamId);
            $team->update($data);
            if ($this->teamImage) {
                $team->clearMediaCollection('avatar');
                $team->addMedia($this->teamImage)->toMediaCollection('avatar');
            }
            $msg = 'Team member updated successfully!';
        } else {
            $team = Team::create($data);
            if ($this->teamImage) {
                $team->addMedia($this->teamImage)->toMediaCollection('avatar');
            }
            $msg = 'Team member added successfully!';
        }

        $this->resetTeamForm();
        $this->loadTeams();
        $this->dispatch('notify', ['message' => $msg, 'type' => 'success']);
    }

    public function deleteTeam($id)
    {
        Team::find($id)?->delete();
        $this->loadTeams();
        $this->dispatch('notify', ['message' => 'Team member removed.', 'type' => 'success']);
    }

    private function resetTeamForm()
    {
        $this->editingTeamId = null;
        $this->teamName = '';
        $this->teamPosition = '';
        $this->teamBio = '';
        $this->teamLinkedin = '';
        $this->teamGithub = '';
        $this->teamSortOrder = Team::count();
        $this->teamImage = null;
    }

    public function render()
    {
        return view('livewire.admin.about')
            ->layout('layouts.admin.app', ['title' => 'About Page']);
    }
}
