<?php

namespace Behavioral\MediatorV2;

class UserRepositoryUiMediator implements Mediator
{
    private UserRepository $userRepository;
    private Ui $ui;

    public function __construct(UserRepository $userRepository, Ui $ui)
    {
        $this->ui = $ui;
        $this->userRepository = $userRepository;
        $this->userRepository->setMediator($this);
        $this->ui->setMediator($this);
    }

    public function printInfoAbout(string $user)
    {
        $this->ui->outputUserInfo($user);
    }

    public function getUser(string $username): string
    {
        return $this->userRepository->getUserName($username);
    }

}