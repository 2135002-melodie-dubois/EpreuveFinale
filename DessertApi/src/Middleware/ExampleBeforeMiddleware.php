<?php
namespace App\Middleware;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
// Classe repository où je traite avec la BD
use App\Domain\Dessert\Repository\UserRepository;
class ExampleBeforeMiddleware
{
    
    private $repository;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }
    
    /**
     * Validation d'une clé api
     *
     * @param  ServerRequestInterface  $request PSR-7 request
     * @param  RequestHandler $handler PSR-15 request handler
     *
     * @return Response
     */
    public function __invoke(ServerRequestInterface $request, RequestHandler $handler): Response
    {
        // Je récupère la clé ajouté dans l'entête de la requête Sous la forme 
        // Authorization : api_key voiciMaCle
        $apiKey = explode(' ', $request->getHeaderLine('Authorization'))[1] ?? '';
        
        // Faire un fonction qui va aller vérifier dans la base de données si la clé existe
        // dans mon code la fonction est dans la classe repository ()
        if($this->repository->isValidKey($apiKey) == false) {
            // On retourne un message d'erreur, la requète ne sera pas exécuter
            $response = new Response();
            $response->getBody()->write(json_encode(["erreur" => "La clé est invalide. Accès non autorisé"]));
            return $response
                ->withStatus(403)
                ->withHeader('Content-Type', 'application/json');
        }     
        // la ligne suivante permet de lancer la requète
        return $handler->handle($request);
    }
}