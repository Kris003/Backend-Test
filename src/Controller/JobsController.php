<?php

namespace App\Controller;

use App\Entity\Jobs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class JobsController extends AbstractController
{
    #[Route('/jobs/create', name: 'app_jobs_index', methods: ['POST'])]
    public function create(EntityManagerInterface $entityManager, Request $request): Response
    {
        // Get JSON data from the request
        $data = json_decode($request->getContent(), true);

        // Check if all required parameters are present
        $requiredParameters = ['name', 'date', 'status', 'assesment', 'utc'];
        foreach ($requiredParameters as $param) {
            if (!isset($data[$param])) {
                return new Response(sprintf('Missing parameter: %s', $param), Response::HTTP_BAD_REQUEST);
            }
        }

        // Create a new job with the desired properties
        $job = (new Jobs())
            ->setName($data['name'])
            ->setDate($data['date']) // No need to use strtotime
            ->setStatus($data['status'])
            ->setAssesment($data['assesment'])
            ->setutc($data['utc']);

        // Persist and flush the job
        $entityManager->persist($job);
        $entityManager->flush();

        // Use sprintf for better readability
        return new Response(sprintf('Saved new job with id %s', $job->getId()));
    }

    #[Route('/jobs/delete/{id}', name: 'app_jobs_delete', methods: ['DELETE'])]
    public function delete(EntityManagerInterface $entityManager, int $id): Response
    {
        // Find the job by its id
        $job = $entityManager->getRepository(Jobs::class)->findOneBy(['id' => $id]);

        // If the job exists, remove it
        if ($job) {
            $entityManager->remove($job);
            $entityManager->flush();

            return new Response(sprintf('Deleted job with id %d', $id));
        }

        // If the job does not exist, return a message
        return new Response(sprintf('No job found with id %d', $id));
    }


#[Route('/jobs/update/{id}', name: 'app_jobs_update', methods: ['POST'])]
public function update(EntityManagerInterface $entityManager, Request $request, int $id): Response
{
    // Find the job by its id
    $job = $entityManager->getRepository(Jobs::class)->findOneBy(['id' => $id]);

    // If the job does not exist, return a message
    if (!$job) {
        return new Response(sprintf('No job found with id %d', $id));
    }

    // Get JSON data from the request
    $data = json_decode($request->getContent(), true);

    // Update the job with the new properties if they are present in the request
    if (isset($data['name'])) {
        $job->setName($data['name']);
    }
    if (isset($data['date'])) {
        $job->setDate($data['date']); // No need to use strtotime
    }
    if (isset($data['status'])) {
        $job->setStatus($data['status']);
    }
    if (isset($data['assesment'])) {
        $job->setAssesment($data['assesment']);
    }
    if (isset($data['utc'])) {
        $job->setutc($data['utc']);
    }

    // Persist and flush the job
    $entityManager->persist($job);
    $entityManager->flush();

    // Use sprintf for better readability
    return new Response(sprintf('Updated job with id %s', $job->getId()));
}

#[Route('/jobs', name: 'app_jobs_view', methods: ['GET'])]
public function read(EntityManagerInterface $entityManager, Request $request): Response
{
    $name = $request->query->get('name');

    // If a name is provided, find the job by its name
    // If not, get all jobs
    $jobs = $name 
        ? $entityManager->getRepository(Jobs::class)->findBy(['name' => $name])
        : $entityManager->getRepository(Jobs::class)->findAll();

    // If jobs exist, print them
    if (!empty($jobs)) {
        $jobsArray = [];
        foreach ($jobs as $job) {
            $jobsArray[] = [
                'ID' => $job->getId(),
                'Job Name' => $job->getName(),
                'Date' => $job->getDate(),
                'Status' => $job->getStatus(),
                'Assessment' => $job->getAssesment(),
                'utc' => $job->getutc()
            ];
        }

        return new Response(json_encode($jobsArray));
    } else {
        // If no jobs exist, send an error message
        return new Response('No jobs found', 404);
    }
}
}
?>