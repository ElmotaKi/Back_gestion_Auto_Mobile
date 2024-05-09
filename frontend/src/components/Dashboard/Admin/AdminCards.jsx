import React from 'react';
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from '../../ui/card';

function AdminCards() {
  return (
    <div className="flex flex-wrap justify-center gap-4 md:gap-8 ">
      <div >
        <div className="flex justify-center w-full md:w-1/3">
          <Card >
            <CardHeader>
              <CardTitle>Chiffre d’affaires</CardTitle>
              <CardDescription>Déscription</CardDescription>
            </CardHeader>
            <CardContent>
              <p>Contenu</p>
            </CardContent>
            <CardFooter>
              <p>Un footer</p>
            </CardFooter>
          </Card>
        </div>
        <div className="flex justify-center w-full md:w-1/3">
          <Card>
            <CardHeader>
              <CardTitle>Parking</CardTitle>
              <CardDescription>Déscription</CardDescription>
            </CardHeader>
            <CardContent>
              <p>Contenu</p>
            </CardContent>
            <CardFooter>
              <p>Un footer</p>
            </CardFooter>
          </Card>
        </div>
        <div className="flex justify-center w-full md:w-1/3">
          <Card>
            <CardHeader>
              <CardTitle>Voitures Louées</CardTitle>
              <CardDescription>Déscription</CardDescription>
            </CardHeader>
            <CardContent>
              <p>Contenu</p>
            </CardContent>
            <CardFooter>
              <p>Un footer</p>
            </CardFooter>
          </Card>
        </div>
      </div>

      <div>
        <div className="flex justify-center w-full md:w-1/3">
          <Card>
            <CardHeader>
              <CardTitle>Clients</CardTitle>
              <CardDescription>Déscription</CardDescription>
            </CardHeader>
            <CardContent>
              <p>Contenu</p>
            </CardContent>
            <CardFooter>
              <p>Un footer</p>
            </CardFooter>
          </Card>
        </div>
        <div className="flex justify-center w-full md:w-1/3">
          <Card>
            <CardHeader>
              <CardTitle>Voitures</CardTitle>
              <CardDescription>Déscription</CardDescription>
            </CardHeader>
            <CardContent>
              <p>Contenu</p>
            </CardContent>
            <CardFooter>
              <p>Un footer</p>
            </CardFooter>
          </Card>
        </div>
        <div className="flex justify-center w-full md:w-1/3">
          <Card>
            <CardHeader>
              <CardTitle>Voitures Libres</CardTitle>
              <CardDescription>Déscription</CardDescription>
            </CardHeader>
            <CardContent>
              <p>Contenu</p>
            </CardContent>
            <CardFooter>
              <p>Un footer</p>
            </CardFooter>
          </Card>
        </div>
      </div>

      <div>
        <div className="flex justify-center w-full md:w-1/3">
          <Card>
            <CardHeader>
              <CardTitle>Agents</CardTitle>
              <CardDescription>Déscription</CardDescription>
            </CardHeader>
            <CardContent>
              <p>Contenu</p>
            </CardContent>
            <CardFooter>
              <p>Un footer</p>
            </CardFooter>
          </Card>
        </div>
        <div className="flex justify-center w-full md:w-1/3">
          <Card>
            <CardHeader>
              <CardTitle>Réservations</CardTitle>
              <CardDescription>Déscription</CardDescription>
            </CardHeader>
            <CardContent>
              <p>Contenu</p>
            </CardContent>
            <CardFooter>
              <p>Un footer</p>
            </CardFooter>
          </Card>
        </div>
        <div className="flex justify-center w-full md:w-1/3">
          <Card>
            <CardHeader>
              <CardTitle>Voitures en panne</CardTitle>
              <CardDescription>Déscription</CardDescription>
            </CardHeader>
            <CardContent>
              <p>Contenu</p>
            </CardContent>
            <CardFooter>
              <p>Un footer</p>
            </CardFooter>
          </Card>
        </div>
      </div>
    </div>
  );
}

export default AdminCards;
